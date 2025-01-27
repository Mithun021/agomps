<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Enroll_tournament_players_model extends Model
    {
        protected $table         = 'enrolled_tournament_players';
        protected $primaryKey = 'id';
        protected $allowedFields = ['enroll_tournament_id','enroll_player_name','enroll_player_age','enroll_player_jersey_no','enroll_player_mobile_number'];

        public function add($data, $id = null) {
            if ($id != null) {
                $result = $this->update($id, $data);
                return $result ? true : 'Data not updated: Update failed.';
            } else {
                $result = $this->insert($data);
                return $result ? true : 'Data not inserted: Insertion failed.';
            }
        }

        public function get($id = null){
            if($id != null){
                $result = $this->where('id',$id)->first();
            }else{
                $result = $this->findAll();
            }
            return $result;
        }
        
    }
?>