<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Tournament_model extends Model
    {
        protected $table         = 'tournament_detail';
        protected $primaryKey = 'id';
        protected $allowedFields = ['league_session_id','league_for','game_type','sports_id','sport_subcategory','min_players','max_players','min_age','max_age','registration_fee','discount_registration_fee','team_entry_fee','team_entry_fee_discount','first_rank_price','first_rank_trophy','second_rank_price','second_rank_trophy','third_rank_price','third_rank_trophy','description','featured_image','status'];
        protected $createdField  = 'created_at';

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

        public function getActiveData() {
            return $this->where('status', 1)->findAll();
        }
        public function getBySportsLeague($sports_id,$league_id){
            return $this->where('sports_id', $sports_id)->where('league_category_id', $league_id)->first();
        }
        public function getBySportsLeagueCurrentSession($sports_id,$league_id,$session_id){
            return $this->where('sports_id', $sports_id)->where('league_category_id', $league_id)->where('league_category_id',$session_id)->first();
        }

        public function get_by_category($league_id,$sports_id,$game_type){
            return $this->where('sports_id', $sports_id)->where('league_session_id', $league_id)->where('game_type',$game_type)->findAll();
        }
        
    }
?>