<?php
function tag($balise, $content='', $attribut=array(), $before='', $after=''){
  $output = "<!-- $before -->";
  $output .= "<$balise";
  foreach ($attribut as $index => $value) {
    $output.=" $index='$value'";
  }
  if (empty($content)) {
    $output.="/>";
  }else {
    $output.="> $content </$balise>";
  }
  $output .= "<!-- $after -->";
  return $output;
}

/*function tag2($balise, $content,$content='',$content='',$content='', $attribut=array(), $before='', $after=''){
  $output = "<!-- $before -->";
  $output .= "<$balise";
  foreach ($attribut as $index => $value) {
    $output.=" $index='$value'";
  }
  if (empty($content)) {
    $output.="/>";
  }else {
    $output.="> $content </$balise>";
  }
  $output .= "<!-- $after -->";
  return $output;
} */

function select($name,$option,$attribut=array(),$presel="",$size=1){
  $content="";
  foreach ($option as $value => $texte) {
    if($value==$presel){
      $att=array('selected'=>$presel);
    }
    $att['value']=$value;
    $content.=tag('option',$texte,$att);
  }
  $attribut['size']=$size;
  $attribut['name']=$name;
  return tag('select',$content,$attribut);
}

function cellule($content,$attribut=array()){
  return tag("td",$content,$attribut);
}

function ligne($content,$attribut=array()){
  return tag("tr",$content,$attribut);
}

function tableau($content,$attribut=array()){
  return tag("table",$content,$attribut);
}

?>
