<?php

/*
 *  FINDMYFARE.COM - Team Innovation 
 *  ---------------------------------
 */

class hotdeal_details_mod extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database("cms_sel");
    }

    //1
    public function hotdeal_hotelID($data) {

        $stmtGetId = $this->db->conn_id->prepare("SELECT id,city_info FROM fhd_hotdeal_hotel_info WHERE hotel_name=?");
        $stmtGetId->bindValue(1, $data['hotel_name']);
        $stmtGetId->execute();
        $hotelIDArr = $stmtGetId->fetchAll(PDO::FETCH_ASSOC);
        return $hotelIDArr;
    }

    //2
    public function hotdeal_info($data2) {

        $stmt = $this->db->conn_id->prepare("SELECT H.id,H.hotel_name,H.room_type,B.b_basis as board_basis,H.discount_pre,H.no_of_vouchers,H.commision_rate,H.exp_hotel_id,H.ishotdeal,H.isshow,H.priority,H.SplDiscount_allowed,H.occupancy,H.block_category,I.vaild_from,I.vaild_to,I.min_date,I.blocked_dates,I.room_limit,I.SplDiscount_Pre,I.SplDicount_bank,H.regular_price, (H.regular_price -(H.regular_price *(I.SplDicount_bank + I.SplDiscount_Pre)/100)) AS Sub FROM fhd_hotdeal_hotel_info I INNER JOIN fhd_hotel_hot_deals H ON I.hotel_name=H.hotel_name INNER JOIN fhd_board_basis B ON H.board_basis=B.Id AND H.isshow=1 AND H.hotel_id=? ORDER BY Sub ASC");
        $stmt->bindValue(1, $data2['hotel_id']);
        $stmt->execute();
        $hot_deal_info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $hot_deal_info;
    }

    //3
    public function hotdeal_hot_hotels($data) {

        //get hotel basic
        $stmt2 = $this->db->conn_id->prepare("SELECT * FROM fhd_hotdeal_hotel_info WHERE hotel_name=?");
        $stmt2->bindValue(1, $data['hotel_name']);
        $stmt2->execute();
        $hot_hotel = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        return $hot_hotel;
    }

    //4
    public function hot_hotel_id($data3) {

        //get inclusive information
        $stmtInc = $this->db->conn_id->prepare("SELECT * FROM fhd_inclusives WHERE hotel_id=?");
        $stmtInc->bindValue(1, $data3['hot_hotel_id']);
        $hot_deal_inclusives = $stmtInc->fetchAll(PDO::FETCH_ASSOC);
        
        return $hot_deal_inclusives;
    }

    //5
    public function terms_conditions() {

        //get terms and conditions
        $stmtTC = $this->db->conn_id->prepare("SELECT * FROM  fhd_terms_conditions");
        $stmtTC->execute();
        $hot_deal_TC = $stmtTC->fetchAll(PDO::FETCH_ASSOC);
        
        return $hot_deal_TC;
    }

    //6
    public function hotdeal_count() {
        
        $stmt3 = $this->db->conn_id->prepare("SELECT COUNT( B.id ) AS rooms, (SELECT COUNT( DISTINCT hotel_name ) FROM fhd_hotel_hot_deals A) AS hotels FROM fhd_hotel_hot_deals B");
        $stmt3->execute();
        $hot_deal_counts = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        
        return $hot_deal_counts;
    } 
    
    
    public function hotel_info_slider($city)
    {
        $stmtGetId = $this->db->conn_id->prepare("SELECT distinct H.hotel_name,I.homepage_image,H.regular_price, (H.regular_price -(H.regular_price *(I.SplDicount_bank + I.SplDiscount_Pre)/100)) AS Sub FROM fhd_hotdeal_hotel_info I INNER JOIN fhd_hotel_hot_deals H WHERE I.hotel_name=H.hotel_name AND I.city_info= ? group by hotel_name ORDER BY regular_price ASC ");
        $stmtGetId->bindValue(1, $city['city_info']);
        $stmtGetId->execute();
        $hotel_info = $stmtGetId->fetchAll(PDO::FETCH_ASSOC);
        return $hotel_info;
        
    }

}
