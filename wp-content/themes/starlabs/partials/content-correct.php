<?php
if($author_id==$user_id){
  if ($is_correct) {
      $text .= '<button name="is_correct" class="absolute top-0 right-0 mr-4" id="iscorrect">
      <p class="text-green-600 font-bold">Correct</p>
      </button>';
  } else {
      $text .= '<button name="is_correct" class="absolute top-0 right-0 mr-4" id="iscorrect'.$comment_id.'" onclick="markAsCorrect('.$comment_id.')" >
      <p class="text-slate-500">Mark as correct</p>
      </button>';
  }
}
?>