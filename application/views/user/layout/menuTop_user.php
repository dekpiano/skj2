<?php
$data['lear'] =	$this->db->get('tb_learning')->result(); //กลุ่มสาระ	
$data['Allabout'] = $this->db->get('tb_aboutschool')->result(); //เกี่ย่วกับโรงเรียน
$data['about'] = $this->db->where('about_id',$id)->get('tb_aboutschool')->result(); //เกี่ย่วกับโรงเรียน
?>