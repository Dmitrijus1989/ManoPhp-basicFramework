<?php

class Tinder {

    private $userRepository;
    private $session;

    /**
     * @var User
     */
    private $currentUser;
    private $viewed;
    private $liked;

    public function __construct(UserRepository $ur, Session $session) {
        $this->session = $session;
        $this->userRepository = $ur;
        $this->currentUser = $this->session->getCurrentUser();

        if ($this->currentUser) {
            $user_data = $this->currentUser->getData();
            $this->viewed = $user_data['viewed'] ?? [];
            $this->liked = $user_data['liked'] ?? [];
        }
    }

    public function user_add($user) {
        $this->userRepository->add($user);
    }

    public function like() {
        $current_look = $this->user_view_current() ?? false; // current or last wiewed user
        if ($current_look) {
            $this->liked[$current_look->getEmail()] = $current_look->getEmail();
            $this->currentUser->updateAllDataByID('liked', $this->liked);
        }
    }

    public function user_view_next() {
        $all_users = $this->userRepository->loadAll();
        $this_user_gender = $this->currentUser->getData()['gender'];
              
        foreach ($all_users as $any_user) {
            if ($this_user_gender != $any_user->getData()['gender']) {
                if (!in_array($any_user, $this->viewed)) {
                    $this->viewed[] = $any_user;
                    $this->currentUser->updateAllDataByID('viewed', $this->viewed);
                    $any_user = $this->user_view_current();
                    return $any_user;
                }
            }
        }
    }

    public function user_view_current() {
        $all_users = $this->userRepository->loadAll();
        $this_user_gender = $this->currentUser->getData()['gender'];
        foreach ($all_users as $any_user) {
            if ($this_user_gender != $any_user->getData()['gender']) {
                if (!in_array($any_user, $this->viewed)) {
                    return $any_user;
                }
            }
        }
    }

    public function user_view_last() {
        if (!empty($this->viewed)) {
            return end($this->viewed);
        } else {
            return $this->user_view_next();
        }
    }

    public function findMatches() {
        $all_liked_users = [];
        $temp_match_list = [];
        $current_user_email = $this->currentUser->getEmail();
        $all_users = $this->userRepository->loadAll();
        foreach ($all_users as $value) {
            $this_value_email = $value->getEmail();
            if (in_array($this_value_email, $this->liked)) {
                $all_liked_users[] = $value;
            }
        }
        foreach ($all_liked_users as $value) {
            if (isset($value->getData()['liked'])) {

                if (in_array($current_user_email, $value->getData()['liked'])) {
                    $temp_match_list[] = $value;
                }
            }
        }

        return $temp_match_list;
    }

    public function updateCurrentUser() {
        $user = $this->currentUser;
        $this->userRepository->update($user);
    }

    public function cleanAllWiewedLikedInCurrentUser() {
        $this->currentUser->cleanAllWiewedAndLiked();
        $this->viewed = [];
        $this->liked = [];
        $this->userRepository->update($this->currentUser);
    }

}
