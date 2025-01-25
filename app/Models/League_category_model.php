<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class League_category_model extends Model
    {
        protected $table         = 'league_category';
        protected $primaryKey = 'id';
        protected $allowedFields = ['sports_id','name','featured_image','status'];

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
        
    }
?>