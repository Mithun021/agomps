<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Investment_model extends Model
    {
        protected $table         = 'investment';
        protected $primaryKey = 'id';
        protected $allowedFields = ['title','description','plan_type_id','duration_id','profit','invest_duration','durantion_type','min_amount','expected_return','expected_profit','featured_image','status'];
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

        public function get_by_plan($plan_id) {
            return $this->where('status', 1)->where('plan_type_id',$plan_id)->findAll();
        }
        
    }
?>