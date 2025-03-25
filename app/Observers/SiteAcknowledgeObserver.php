<?php

namespace App\Observers;

use App\Models\SiteAcknowledge;
use DateTime;

class SiteAcknowledgeObserver
{
    private function getUser($site_name){
        $params = request()->json()->all();
        $user = null;
        if(!empty($params)){
            $specific_param = null;
            foreach($params as $row){
                if(explode('/', $row['site_name'])[0] == $site_name){
                    $specific_param = $row;
                    break;
                }
            }
            $user = !empty($specific_param['user'])? $specific_param['user']: null;
        }

        return $user;
    }

    /**
     * Handle the SiteAcknowledge "created" event.
     *
     * @param  \App\Models\SiteAcknowledge  $siteAcknowledge
     * @return void
     */
    public function created(SiteAcknowledge $siteAcknowledge)
    {
        $user = $this->getUser($siteAcknowledge->site_name);

        if($siteAcknowledge->renstra == 1){
            $siteAcknowledge->renstra_checked_at = new DateTime();
            $siteAcknowledge->renstra_checked_by = $user;
        }

        if($siteAcknowledge->perolehan == 1){
            $siteAcknowledge->perolehan_checked_at = new DateTime();
            $siteAcknowledge->perolehan_checked_by = $user;
        }

        if($siteAcknowledge->pengelolaan == 1){
            $siteAcknowledge->pengelolaan_checked_at = new DateTime();
            $siteAcknowledge->pengelolaan_checked_by = $user;
        }

        if($siteAcknowledge->pemanfaatan == 1){
            $siteAcknowledge->pemanfaatan_checked_at = new DateTime();
            $siteAcknowledge->pemanfaatan_checked_by = $user;
        }
    }

    public function updating(SiteAcknowledge $siteAcknowledge){
        $user = $this->getUser($siteAcknowledge->site_name);

        if($siteAcknowledge->isDirty('renstra')){
            $old_value = $siteAcknowledge->getOriginal('renstra');
            if($old_value != $siteAcknowledge->renstra){
                if($old_value == 0){
                    $siteAcknowledge->renstra_checked_at = new DateTime();
                    $siteAcknowledge->renstra_checked_by = $user;
                }else{
                    $siteAcknowledge->renstra_unchecked_at = new DateTime();
                    $siteAcknowledge->renstra_unchecked_by = $user;
                }
            }
        }

        if($siteAcknowledge->isDirty('perolehan')){
            $old_value = $siteAcknowledge->getOriginal('perolehan');
            if($old_value != $siteAcknowledge->perolehan){
                if($old_value == 0){
                    $siteAcknowledge->perolehan_checked_at = new DateTime();
                    $siteAcknowledge->perolehan_checked_by = $user;
                }else{
                    $siteAcknowledge->perolehan_unchecked_at = new DateTime();
                    $siteAcknowledge->perolehan_unchecked_by = $user;
                }
            }
        }

        if($siteAcknowledge->isDirty('pengelolaan')){
            $old_value = $siteAcknowledge->getOriginal('pengelolaan');
            if($old_value != $siteAcknowledge->pengelolaan){
                if($old_value == 0){
                    $siteAcknowledge->pengelolaan_checked_at = new DateTime();
                    $siteAcknowledge->pengelolaan_checked_by = $user;
                }else{
                    $siteAcknowledge->pengelolaan_unchecked_at = new DateTime();
                    $siteAcknowledge->pengelolaan_unchecked_by = $user;
                }
            }
        }

        if($siteAcknowledge->isDirty('pemanfaatan')){
            $old_value = $siteAcknowledge->getOriginal('pemanfaatan');
            if($old_value != $siteAcknowledge->pemanfaatan){
                if($old_value == 0){
                    $siteAcknowledge->pemanfaatan_checked_at = new DateTime();
                    $siteAcknowledge->pemanfaatan_checked_by = $user;
                }else{
                    $siteAcknowledge->pemanfaatan_unchecked_at = new DateTime();
                    $siteAcknowledge->pemanfaatan_unchecked_by = $user;
                }
            }
        }
    }

    /**
     * Handle the SiteAcknowledge "updated" event.
     *
     * @param  \App\Models\SiteAcknowledge  $siteAcknowledge
     * @return void
     */
    public function updated(SiteAcknowledge $siteAcknowledge)
    {
        
    }

    /**
     * Handle the SiteAcknowledge "deleted" event.
     *
     * @param  \App\Models\SiteAcknowledge  $siteAcknowledge
     * @return void
     */
    public function deleted(SiteAcknowledge $siteAcknowledge)
    {
        //
    }

    /**
     * Handle the SiteAcknowledge "restored" event.
     *
     * @param  \App\Models\SiteAcknowledge  $siteAcknowledge
     * @return void
     */
    public function restored(SiteAcknowledge $siteAcknowledge)
    {
        //
    }

    /**
     * Handle the SiteAcknowledge "force deleted" event.
     *
     * @param  \App\Models\SiteAcknowledge  $siteAcknowledge
     * @return void
     */
    public function forceDeleted(SiteAcknowledge $siteAcknowledge)
    {
        //
    }
}
