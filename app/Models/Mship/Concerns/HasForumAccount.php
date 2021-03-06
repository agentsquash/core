<?php

namespace App\Models\Mship\Concerns;

use Illuminate\Support\Facades\DB;

    /**
     * Trait HasForumAccount.
     */
    trait HasForumAccount
    {
        /**
         * Sync the current account to the Forum.
         */
        public function syncToForum()
        {
            // Check forum enabled
            $communityClient = DB::table('oauth_clients')->where('name', 'Community')->first();

            if (! config('services.community.init_file') || ! config('services.community.database') || ! $communityClient) {
                return;
            }

            require_once config('services.community.init_file');
            require_once \IPS\ROOT_PATH.'/system/Member/Member.php';
            require_once \IPS\ROOT_PATH.'/system/Member/Club/Club.php';
            require_once \IPS\ROOT_PATH.'/system/Db/Db.php';

            $ipsAccount = \IPS\Db::i()->select(
                'member_id, field_12',
                'core_pfields_content', ['field_12=?', $this->id]);

            if (count($ipsAccount) == 0) {
                // No user. Abort;
                return;
            }

            $ipsAccount = \IPS\Member::load($ipsAccount->first()->member_id);

            // Set data
            $ipsAccount->name = $this->real_name;
            $ipsAccount->email = $this->getEmailForService($communityClient->id);
            $ipsAccount->member_title = $this->primary_state->name;
            $ipsAccount->temp_ban = ($this->is_banned) ? -1 : 0;
            $ipsAccount->save();

            // Set profile data
            $update = [
                'field_12' => $this->id, // VATSIM CID
                'field_13' => $this->qualification_atc->name_long, // Controller Rating
                'field_14' => $this->qualifications_pilot_string, // Pilot Ratings
            ];
            \IPS\Db::i()->update('core_pfields_content', $update, ['member_id=?', $ipsAccount->member_id]);
        }
    }
