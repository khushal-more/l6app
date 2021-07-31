<?php
public function import_manual_outword_auto()
{
    $post=$this->input->post();

    $file_type = explode(".",$_FILES['file']['name']);
    if(strtolower(end($file_type)) == 'csv' && $post['book_Id']!='')
    {
        $filename='uploads/manual_outword/'.time().'.csv';
        move_uploaded_file($_FILES['file']['tmp_name'],$filename);
        $csv_file = $filename;
        if (($handle = fopen($csv_file, "r")) !== FALSE)
        {
            if($post['firm_id']==11)
            {
                $GetReverseEntryBill['reverse_entry_bill']=1;
                $firm_id=$post['firm_id'];
            }
            else
            {
                $GetReverseEntryBill=$this->db->query("SELECT reverse_entry_bill FROM sales_books WHERE book_Id='".$post['book_Id']."'")->row_array();
                $firm_id=$post['firm_id'];
            }

            //$getfirmdeatils=$this->db->query("SELECT firm_id FROM firms_wise_book WHERE book_id='".$post['book_Id']."'")->row_array();

            fgetcsv($handle);
            if($firm_id!='')
            {
                while (($data = fgetcsv($handle, 3000, ",")) !== FALSE)
                {
                    $num = count($data);
                    for ($c=0; $c < $num; $c++)
                    {
                        $col[$c] = $data[$c];
                    }

                    $chunks = preg_split('/(:|-|\/|-)/', $col[1],-1, PREG_SPLIT_NO_EMPTY);
                    $str2= $chunks[0].'-'.$chunks[1].'-'.$chunks[2];

                    //echo  date('Y-m-d',strtotime($str2));
                    $order_no			= trim($col[0]);
                    $uniware_created_at = date('Y-m-d',strtotime($str2));
                    $sku				= trim($col[3]);
                    $customer_name		= trim($col[4]);
                    $customer_email		= trim($col[5]);
                    $customer_mobile	= trim($col[6]);
                    $address_line_1		= trim($col[7]);
                    $address_line_2		= trim($col[8]);
                    $city				= trim($col[9]);
                    $state				= trim($col[10]);
                    $pincode			= trim($col[11]);
                    $amount				= trim($col[12]);
                    $qty   				= ($col[14]=='') ? 'NULL' :  trim($col[14]);
                    $transport			= trim($col[16]);
                    $asin_id			= trim($col[17]);
                    if($sku!='' && $order_no!='' && ($qty!='' && is_numeric($qty)) && ($amount!='' && is_numeric($amount)) && ($pincode!='' && is_numeric($pincode)))
                    {
                        $sku_data = array('order_no'=>$order_no,'book_id'=>$post['book_Id'],'user_id'=>$post['user_id'],'sku_no'=>$sku,'asin_id'=>$asin_id, 'amount'=>$amount,'qty'=>$qty,'created_at' => date('Y-m-d'));

                        $sku_detail_data = array('order_no'=>$order_no,'firm_id'=>$firm_id,'book_id'=>$post['book_Id'],'customer_name'=>$customer_name,'customer_email'=>$customer_email, 'customer_mobile'=>$customer_mobile,'address_line_1'=>$address_line_1,'address_line_2'=>$address_line_2, 'city'=>$city,'state'=>$state,'pincode'=>$pincode, 'transport'=>$transport,'reverse_entry_bill'=>$GetReverseEntryBill['reverse_entry_bill'],'uniware_created_at'=>$uniware_created_at);
                        $check_sql = $this->Flexdata->import_manual_outword_auto($sku_data,$sku_detail_data);
                    }
                }

                //Send Notification Manual Order
                $data_cycle['token']='uyrugrhuh779hjnk';
                $data_cycle['user_id']=$post['user_id'];
                $data_cycle['book_id']=$post['book_Id'];
                $data_cycle['date']=date('d-m-Y',strtotime($sku_detail_data['uniware_created_at']));
                $GenerateCycleCall= json_encode($data_cycle);
                GetAPIDynaFlexCode($GenerateCycleCall,'User/SendWdOrderNotification');

                $mst_data = array('flag' => 1);
                $sql = $this->db->update('manual_outword', $mst_data);
                $this->session->set_flashdata('sku_feedback', 'imported');
                fclose($handle);
            }
        }
    }
}



/*
                        $db_index_order_no      = array_search('order_no', array_column($merged_db_fields, 'name')); //get datatype
                        $array_index_order_no   = array_search('order_no', array_column($book_config_fields, 'db_field')); //get field name
                        $sheet_index_order_no   =  array_search($book_config_fields[$array_index_order_no]['sheet_field'], $label_row); //get sheet index

                        $db_index_sku_no      = array_search('sku_no', array_column($merged_db_fields, 'name'));
                        $array_index_sku_no   = array_search('sku_no', array_column($book_config_fields, 'db_field'));
                        $sheet_index_sku_no   =  array_search($book_config_fields[$array_index_sku_no]['sheet_field'], $label_row);

                        $db_index_customer_name      = array_search('customer_name', array_column($merged_db_fields, 'name'));
                        $array_index_customer_name   = array_search('customer_name', array_column($book_config_fields, 'db_field'));
                        $sheet_index_customer_name   =  array_search($book_config_fields[$array_index_customer_name]['sheet_field'], $label_row);

                        $db_index_customer_email      = array_search('customer_email', array_column($merged_db_fields, 'name'));
                        $array_index_customer_email   = array_search('customer_email', array_column($book_config_fields, 'db_field'));
                        $sheet_index_customer_email   =  array_search($book_config_fields[$array_index_customer_email]['sheet_field'], $label_row);

                        $db_index_customer_mobile      = array_search('customer_mobile', array_column($merged_db_fields, 'name'));
                        $array_index_customer_mobile   = array_search('customer_mobile', array_column($book_config_fields, 'db_field'));
                        $sheet_index_customer_mobile   =  array_search($book_config_fields[$array_index_customer_mobile]['sheet_field'], $label_row);

                        $db_index_address_line_1      = array_search('address_line_1', array_column($merged_db_fields, 'name'));
                        $array_index_address_line_1   = array_search('address_line_1', array_column($book_config_fields, 'db_field'));
                        $sheet_index_address_line_1   =  array_search($book_config_fields[$array_index_address_line_1]['sheet_field'], $label_row);

                        $db_index_address_line_2      = array_search('address_line_2', array_column($merged_db_fields, 'name'));
                        $array_index_address_line_2   = array_search('address_line_2', array_column($book_config_fields, 'db_field'));
                        $sheet_index_address_line_2   =  array_search($book_config_fields[$array_index_address_line_2]['sheet_field'], $label_row);

                        $db_index_city              = array_search('city', array_column($merged_db_fields, 'name'));
                        $array_index_city           = array_search('city', array_column($book_config_fields, 'db_field'));
                        $sheet_index_city           =  array_search($book_config_fields[$array_index_city]['sheet_field'], $label_row);

                        $db_index_state      = array_search('state', array_column($merged_db_fields, 'name'));
                        $array_index_state   = array_search('state', array_column($book_config_fields, 'db_field'));
                        $sheet_index_state   =  array_search($book_config_fields[$array_index_state]['sheet_field'], $label_row);

                        $db_index_pincode      = array_search('pincode', array_column($merged_db_fields, 'name'));
                        $array_index_pincode   = array_search('pincode', array_column($book_config_fields, 'db_field'));
                        $sheet_index_pincode   =  array_search($book_config_fields[$array_index_pincode]['sheet_field'], $label_row);

                        $db_index_amount      = array_search('amount', array_column($merged_db_fields, 'name'));
                        $array_index_amount   = array_search('amount', array_column($book_config_fields, 'db_field'));
                        $sheet_index_amount   =  array_search($book_config_fields[$array_index_amount]['sheet_field'], $label_row);

                        $db_index_qty      = array_search('qty', array_column($merged_db_fields, 'name'));
                        $array_index_qty   = array_search('qty', array_column($book_config_fields, 'db_field'));
                        $sheet_index_qty   =  array_search($book_config_fields[$array_index_qty]['sheet_field'], $label_row);

                        $db_index_transport      = array_search('transport', array_column($merged_db_fields, 'name'));
                        $array_index_transport   = array_search('transport', array_column($book_config_fields, 'db_field'));
                        $sheet_index_transport   =  array_search($book_config_fields[$array_index_transport]['sheet_field'], $label_row);

                        $db_index_asin_id      = array_search('asin_id', array_column($merged_db_fields, 'name'));
                        $array_index_asin_id   = array_search('asin_id', array_column($book_config_fields, 'db_field'));
                        $sheet_index_asin_id   =  array_search($book_config_fields[$array_index_asin_id]['sheet_field'], $label_row);*/
                        $this->db->trans_begin();

                            $this->db->query("insert into sample_table(title) values('555')");
                            $this->db->trans_complete();
//                            $this->db->trans_rollback();

public function import_manual_outword_auto($sku_data,$sku_detail_data)
	{

			//echo '<pre>';print_r($sku_data);


			$check_sql = $this->db->where(array('order_no'=> $sku_data['order_no'], 'book_id'=>$sku_data['book_id'],'sku_no'=>$sku_data['sku_no']))->get('manual_outword')->row_array();
//			if(count($check_sql))
			if(!empty($check_sql))
			{
				$check_sql22 = $this->db->where(array('order_no'=> $sku_data['order_no'], 'book_id'=>$sku_data['book_id'],'sku_no'=>$sku_data['sku_no'],'is_verify'=>0,'flag'=>0))->get('manual_outword')->row_array();
//				if(count($check_sql22))
				if(!empty($check_sql22))
				{


					$tot_qty=$sku_data['qty'];
					$sql = $this->db->where(array('order_no'=> $sku_data['order_no'], 'book_id'=>$sku_data['book_id'],'sku_no'=>$sku_data['sku_no']))->update('manual_outword', array('qty'=>$tot_qty,'amount'=>$sku_data['amount'],'updated_at' => date('Y-m-d')));
					/*$sql = $this->db->where(array('order_no'=> $sku_data['order_no']))->update('outword_detail_mst', array('customer_name'=>$sku_detail_data['customer_name'],'customer_email'=>$sku_detail_data['customer_email'],'customer_mobile'=>$sku_detail_data['customer_mobile'],'address_line_1'=>$sku_detail_data['address_line_1'],'address_line_2'=>$sku_detail_data['address_line_2'],'city'=>$sku_detail_data['city'],'state'=>$sku_detail_data['state'],'pincode'=>$sku_detail_data['pincode'],'transport'=>$sku_detail_data['transport'],'asin_id'=>$sku_detail_data['asin_id'],'uniware_created_at'=>$sku_detail_data['uniware_created_at']));*/
					//echo $this->db->last_query();
					return $sql ? true : false;
				}
				else
				{
					return true;
				}
			}
			else
			{
				$CheckAlready = $this->db->where(array('order_no'=> $sku_data['order_no'], 'book_id'=>$sku_data['book_id'],'flag'=>1))->get('outword_detail_mst')->row_array();
				if(count($CheckAlready)==0)
				{
					$sql = $this->db->insert('manual_outword', $sku_data);
					$cnt_check = $this->db->where(array('order_no'=> $sku_data['order_no'], 'book_id'=>$sku_data['book_id']))->get('outword_detail_mst')->row_array();
					if(count($cnt_check)==0)
					{
						$sql = $this->db->insert('outword_detail_mst', $sku_detail_data);
					}
					return $sql ? true : false;
				}
				else
				{
					return true;
				}

			}


	}



?>


