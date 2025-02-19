<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Investment_users_model extends Model
    {
        protected $table         = 'investment_user_details';
        protected $primaryKey = 'id';
        protected $allowedFields = ['user_id','investment_id','investment_amount','payment_status','razorpay_order_id','razorpay_payment_id','razorpay_signature'];

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

         // Update payment status and save Razorpay data after payment verification
            public function updatePaymentStatus($order_id, $data)
            {
                return $this->where('razorpay_order_id', $order_id)
                            ->set($data)
                            ->update();
            }

           
        
    }
?>