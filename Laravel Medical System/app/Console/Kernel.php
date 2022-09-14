<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\EmpWorkingTime;
use App\Models\Employee;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
          $employees = Employee::where('exist', 1)->get();
          foreach ($employees as $employee) {
            $selected_working_time  = EmpWorkingTime::whereIn('id', $employee->emp_working_times()->pluck('id'))->whereBetween('attend_time', [Carbon::now()->subHour()->format('H:i'), Carbon::now()->format('H:i')])->get();
            if(count($selected_working_time) > 0){
              foreach ($selected_working_time as $working_time) {
                $employee->employee_attendances()->create([
                    'date' => Carbon::now(),
                    'attendance_types_id' => 1,
                    'emp_working_time_id' => $working_time->id,
                    'attend_time' => $working_time->attend_time,
                    'leave_time' => $working_time->leave_time
                ]);
              }
            }
          }
       })->timezone('Asia/Riyadh')
       ->hourly()
       ->days([Schedule::SATURDAY,Schedule::SUNDAY,Schedule::MONDAY,Schedule::TUESDAY,Schedule::WEDNESDAY, Schedule::THURSDAY]);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
