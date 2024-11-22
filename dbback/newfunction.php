
<?php 
class newfunction extends CI_Model
{


    public function user_leaderboard($basic_id)
    {
        $list = $this->db->query('SELECT l.*,b.title,u.id,CONCAT(IFNULL(u.title,"")," ",u.first_name," ",u.last_name) as username,u.college_id FROM `tbl_leader_board` l JOIN basic_information b ON l.`basic_id` = b.`basic_id` JOIN tbl_user u ON l.`userid`=u.`id` WHERE l.`basic_id`='.$basic_id.' ORDER BY l.`correct_answers` DESC, convert(`total_time`, decimal) ASC LIMIT 10;')->result();

        for($i=0;$i<count($list);$i++){
            if($list[$i]->college_id===NULL || $list[$i]->college_id===''){
                $list[$i]->collegename='';
            }
            else{
                $clg_name = $this->db->query('select collegename from tbl_college_master where college_id='.$list[$i]->college_id.';')->result();
                if(count($clg_name)>0){
                    $list[$i]->collegename=$clg_name[0]->collegename;
                }
                else{
                    $list[$i]->collegename='';
                }
            }
        }

        return $list;
    }
    
    
    public function leader_mcq_list(){
        return $this->db->query('SELECT * FROM basic_information WHERE type=6 ORDER BY basic_id DESC;')->result();
    }

    public function list_mcq()
    {
        $this->db->select( '*' );
        $this->db->where( 'type',2 );
        $query = $this->db->get( 'topic' );
        $mcq_topic = $query->result();
        $mcq_array = array();
        $mcq_final = array();
        foreach ( $mcq_topic as $key => $value ){
            $this->db->select( '*' );
            $this->db->where( 'topic_id', $value->topic_id );
            $query = $this->db->get( 'basic_information' );
            $mcq_name = $query->result();
            
            $mcq_array = array (
                'mcq_topic_id' => $value->topic_id ,
                'mcq_topic'    => $value->topic ,
                'mcq_names'    => $mcq_name,
                'created_at'    => $value->created_at,
            );
            array_push($mcq_final,$mcq_array);
        }
        return $mcq_final;
    }

    
	public function cronmailTest(){
		try{
			$this->Mcq_model->cronmailTest();
		}catch(Exception $e){
 
            var_dump($e->getMessage());
        }
	}


    public function quizQ($id)
    {
        $this->db->select( 'qn.*,qt.*' );
        $this->db->join( 'topic qt', 'qt.topic_id = qn.topic_id','left' );
        $this->db->where( 'qn.basic_id',$id ); 
        $query = $this->db->get( 'basic_information qn' );
        $basic = $query->row();

        $questions = $this->db->query('SELECT qid FROM `questions` WHERE `basic_id`='.$id.' AND `question_status`=1;')->result();
        if(count($questions)>0){
            $que_array = array();
            for($i=0;$i<count($questions);$i++){
                array_push($que_array,$questions[$i]->qid);
            }

            $answer = $this->db->query('SELECT * FROM `answer` where qid IN ('.implode (",",$que_array).') AND user_id='.$this->session->userdata( 'id' ).';')->result();

            if(count($answer)>0){
                $basic->attempt_status='Attempted';
            }
            else{
                $basic->attempt_status='NA';
            }
        }
        else{
            $basic->attempt_status='Attempted';
        }

        return $basic;
    }


    public function LastMCQWinner()
    {
        $query1 = $this->db->query('SELECT basic_id from basic_information where type=6 order by basic_id desc limit 1')->result_array();

        $list = $this->db->query('SELECT l.*,b.title,u.id,CONCAT(IFNULL(u.title,"")," ",u.first_name," ",u.last_name) as username,u.college_id,u.profileimage FROM `tbl_leader_board` l JOIN basic_information b ON l.`basic_id` = b.`basic_id` JOIN tbl_user u ON l.`userid`=u.`id` WHERE l.`basic_id`='.$query1[0]['basic_id'].' ORDER BY l.`correct_answers` DESC, convert(`total_time`, decimal) ASC LIMIT 10;')->result();



            for($i=0;$i<count($list);$i++){
                if($list[$i]->college_id===NULL || $list[$i]->college_id===''){
                    $list[$i]->collegename='';
                }
                else{
                    $clg_name = $this->db->query('select collegename from tbl_college_master where college_id='.$list[$i]->college_id.';')->result();
                    if(count($clg_name)>0){
                        $list[$i]->collegename=$clg_name[0]->collegename;
                    }
                    else{
                        $list[$i]->collegename='';
                    }
                }

                $keyPath                    = 'IMAUP/profile/' . $list[$i]->profileimage;
                try {
                    $command = $s3->getCommand('GetObject', array(
                        'Bucket'      => $bucket,
                        'Key'         => $keyPath,
                        'ContentType' => 'image/png',
                        'ResponseContentDisposition' => 'attachment; filename="' . $list[$i]->profileimage . '"'
                    ));
                    $signedUrl = $s3->createPresignedRequest($command, "+6 days");
                    // Create a signed URL from the command object that will last for
                    // 6 days from the current time
                    $presignedUrl = (string)$signedUrl->getUri();
                    $list[$i]->profileimage = $presignedUrl;
                } catch (S3Exception $e) {
                    echo $e->getMessage() . PHP_EOL;
                }

            }
            return $list;
    }
}