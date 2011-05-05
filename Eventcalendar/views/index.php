<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?= lang('module_eventcalendar_title') ?></title>
    <link rel="stylesheet" href="<?= base_url();?>modules/Eventcalendar/lib/styles/calendar.css" type="text/css" media="screen" charset="utf-8" />
    <script src="<?= base_url();?>modules/Eventcalendar/lib/javascripts/jquery-1.6.min.js" type="text/javascript"></script>
    <script src="<?= base_url();?>modules/Eventcalendar/lib/javascripts/eventcalendar-effets.js" type="text/javascript"> </script>

</head>
<body>
    <div id="wrapper">
        <h2><?= $current_month_text ?></h2>
            <table cellspacing="0">
                <thead>
                    <tr>
                        <th><?= lang('mon') ?></th>
                        <th><?= lang('tue') ?></th>
                        <th><?= lang('wed') ?></th>
                        <th><?= lang('thu') ?></th>
                        <th><?= lang('fri') ?></th>
                        <th><?= lang('sat') ?></th>
                        <th><?= lang('sun') ?></th>
                    </tr>
                </thead>
                <tr>
                    <?php
                        for($i=0; $i< $total_rows; $i++)
                        {
                            for($j=0; $j<7;$j++)
                            {
                                $day++;					
                                    if($day>0 && $day<=$total_days_of_current_month)
                                    {
                                        //YYYY-MM-DD date format
                                        $date_form = "$current_year/$current_month/$day";
                                        echo '<td';
                                        //check if the date is today
                                        if($date_form == $today)
                                        {
                                            echo ' id="today"';
                                        }
                                            //check if any event stored for the date
                                            if(array_key_exists($day,$events))
                                            {
                                                //adding the date_has_event class to the <td> and close it
                                                echo ' class="date_has_event"> '.$day;
                                                //adding the eventTitle and eventContent wrapped inside <span> & <li> to <ul>
                                                echo '<div class="events"><ul>';

                                                foreach ($events as $key=>$event):
                                                    if ($key == $day):
                                                        foreach ($event as $single):
                                                                $eventLang =   $this->eventcalendar->getEventLang($single->id_event, Settings::get_lang());
                                                            ?>
                                                                 <li>
                                                                    <a href="#" />
                                                                        <span class="title"><?= $eventLang['title'] ?></span>
                                                                        <span class="subtitle"><?= $eventLang['subtitle'] ?></span>
                                                                        <span class="description"><?= $eventLang['description'] ?></span>
                                                                    </a>
                                                                </li>
                                                            <?php
                                                        endforeach;// end of for each $event
                                                    endif;
                                                endforeach;// end of foreach $events
                                                echo '</ul></div>';
                                            } // end of if(array_key_exists...)
                                        else 
                                        {
                                            //if there is not event on that date then just close the <td> tag
                                            echo '> '.$day;
                                        }
                                        echo "</td>";
                                    }
                                else 
                                {
                                    //showing empty cells in the first and last row
                                    echo '<td class="padding">&nbsp;</td>';
                                }
                            }
                        echo "</tr><tr>";
                    }
                ?>
                </tr>
                <tfoot>		
                    <th>
                        <a href="eventcalendar/index/<?= $previous_year ?>" title="<?= $previous_year_text ?>">&laquo;&laquo;</a>
                    </th>
                    <th>
                        <a href="eventcalendar/index/<?= $previous_month ?>" title="<?= $previous_month_text ?>">&laquo;</a>
                    </th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>
                        <a href="eventcalendar/index/<?= $next_month ?>" title="<?= $next_month_text ?>">&raquo;</a>
                    </th>
                    <th>
                        <a href="eventcalendar/index/<?= $next_year ?>" title="<?= $next_year_text ?>">&raquo;&raquo;</a>
                    </th>		
                </tfoot>
            </table>
        </div>
    </div>
</body>
</html>