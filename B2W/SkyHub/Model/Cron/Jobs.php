<?php
/**
 * BSeller - B2W Companhia Digital
 *
 * DISCLAIMER
 *
 * Do not edit this file if you want to update this module for future new versions.
 *
 * @copyright     Copyright (c) 2019 B2W Companhia Digital. (http://www.bseller.com.br/)
 * @author        Tiago Tescaro <tiago.tescaro@b2wdigital.com>
 */

namespace B2W\SkyHub\Model\Cron;

class Jobs
{
   const TYPE_QUEUE_PRODUCT = 'product_update';
   const TYPE_QUEUE_ORDER = 'order_update';

   /**
    * Register cron jobs
    *
    * @return void
    */
   public function registerCronJobs($wpRescheduleEvent = false)
   {
      $jobs = \App::config('cronjobs');
      if (!$jobs) {
         return false;
      }

      foreach ($jobs as $job) {
         if (!$job['timestamp'] || !$job['recurrence'] || !$job['hook']) {
            continue;
         }

         if (!$job['args']) {
            $job['args'] = array();
         }

         if ($wpRescheduleEvent) {
            wp_unschedule_hook($job['hook']);
         }

         $this->registerSchedule($job);
         add_action($job['hook'], $job['jobs']);
      }
   }

   /**
    * Delete cron jobs
    */
   public function unsetCronJobs()
   {
      $jobs = \App::config('cronjobs');

      if (!$jobs) {
         return false;
      }

      foreach ($jobs as $job) {
         wp_unschedule_hook($job['hook']);
     }
   }

   /**
    * Register schedule
    *
    * @param Array $job
    * @return Bollean
    */
   protected function registerSchedule(Array $job)
   {
      if (wp_next_scheduled($job['hook'])) {
         return false;
      }

      wp_schedule_event(
         $job['timestamp'],
         $job['recurrence'],
         $job['hook'],
         $job['args']
      );

      return true;
   }

   /**
    * Add time in schedule. Filter is instance in function wp_get_schedules
    *
    * @param Array $schedules
    * @return Array
    */
   public function add_wp_cron_schedules($schedules)
   {
      $schedules['every_minute'] =  array(
         'interval' => MINUTE_IN_SECONDS, 
         'display' =>  'Every Minute'
      );
      return $schedules;
   }
}