<?php
if($author_id==$user_id){
  if ($is_correct) {
      $text .= '<p class="absolute top-0 right-0 pr-4"><button name="is_correct" id="iscorrect">Correct</button></p>';
  } else {
      $text .= '<p class="absolute top-0 right-0 pr-4"><button name="is_correct" id="iscorrect'.$comment_id.'" onclick="markAsCorrect('.$comment_id.')">Mark as correct</button></p>';
  }
}
?>