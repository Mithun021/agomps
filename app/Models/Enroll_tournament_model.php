<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Enroll_tournament_model extends Model
    {
        protected $table         = 'enroll_tournament';
        protected $primaryKey = 'id';
        protected $allowedFields = ['player_id','tournament_id','team_name','registration_status','payment_status','enroll_payment','payment_screenshot'];

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

        public function get_by_player_sport_league($loggedplayerId, $sports_id, $league_id, $active_league_id){
            return $this->where('player_id', $loggedplayerId)
                        ->where('sports_category', $sports_id)
                        ->where('league_category_id', $league_id)
                        ->where('registration_status', 1)
                        ->where('league_session_id', $active_league_id)
                        ->first(); 
        }

        public function find_tournament_id($playerId,$sports_id,$league_id,$session_id){
            return $this->where('player_id', $playerId)
                        ->where('sports_category', $sports_id)
                        ->where('league_category_id', $league_id)
                        ->where('league_session_id',$session_id)
                        ->where('registration_status',1)
                        ->first();
        }
        
    }
?>