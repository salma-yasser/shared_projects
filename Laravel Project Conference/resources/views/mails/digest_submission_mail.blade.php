Dear <i>{{ $obj->receiver }}</i>,
<p>The scientific committee  of Tanta University International Scientific Research Conference 2019  confirms receiving new files for your ISR19 submission.	
<br/>The information about this update is shown below.</p>
 
<div>
<b>ID:</b>&nbsp;{{ $obj->paper->id }}<br/>
<b>Authors:</b>&nbsp;<?php foreach($obj->paper->authors as $author){ echo $author->fname .' '. $author->lname . ','; } ?><br/>
<b>Title:</b>&nbsp;{{ $obj->paper->title }}<br/>
<b>Uploaded by:</b>&nbsp;{{ $obj->paper->user->fname }} {{ $obj->paper->user->lname }}<br/>
<b>Updates:</b>&nbsp;<?php echo $obj->paper->title .".". substr(strrchr($obj->paper->file, "."), 1); ?><br/>
</div>
 
To access the new version of your submission you should log in to
the isr.tanta.edu.eg page.
<br/><br/>
Accept best wishes,
<br/>
<i>{{ $obj->sender }}</i>