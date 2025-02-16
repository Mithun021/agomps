<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Investment_duration_model extends Model
    {
        protected $table         = 'investment_duration';
        protected $primaryKey = 'id';
        protected $allowedFields = ['investment_type_id','duration','profit','notes'];

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

        public function get_by_plan_id($id) {
            return $this->where('investment_type_id', $id)->findAll();
        }
        
    }
?>