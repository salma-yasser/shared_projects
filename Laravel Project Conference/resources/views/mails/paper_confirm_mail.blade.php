Dear <i>{{ $obj->receiver }}</i>,
<p>I am pleased to inform you that your abstract entitled, “{{ $obj->paper->id }}&nbsp;-&nbsp;{{ $obj->paper->title }}”, has
been accepted for presentation at 5th International Conference on Scientific Research (ISR),
Renewable Energy & Water Sustainability, which will be held in Sharm El Sheikh, Egypt,
between March 26 and March 29, 2019. The conference is organized by Tanta University, Egypt,
and provides the opportunity to explore recent developments, current practices and future trends
in the abovementioned fields. The organizing committee is looking forward your participation in
this important conference.
<br/>For conference registration and hotel arrangements, I advise you to check the conference website
at http://isr.tanta.edu.eg</p>
In the meantime, if you have any questions, please feel free to get in touch with us.
<br/><br/>
Please consider the following reviewer comments:
<div>
<?php foreach($obj->paper->paperscomments as $comment){ 
	echo $comment->comment .',<br/>'; 
} ?>
</div>
<br/>
Sincerely,
<br/>
<i>{{ $obj->sender }}</i><br/>
isr_secretariat@unv.tanta.edu.eg