<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Traodoi extends Model
{
    use HasFactory;
//    private $table = "traodoi";
    protected $fillable = ['NOIDUNG', "MA_NGUOIDUNG", "MA_CUAHANG", "THOIGIAN"];
    
    
    
    public static function list_by_ch($mach){
        $sql = "select nd.MA_NGUOIDUNG, nd.TEN_NGUOIDUNG, td.NOIDUNG, td.THOIGIAN , max.TRANGTHAI, td.MA_TRAODOI from traodoi as td
            inner join ( select MAX(MA_TRAODOI) as MA_TRAODOI, SUM(CASE WHEN TRANGTHAI=0 THEN 1 ELSE 0 END) as TRANGTHAI from  traodoi where TRA_MA_TRAODOI IS NULL GROUP BY MA_NGUOIDUNG, MA_CUAHANG) as max
            on max.MA_TRAODOI = td.MA_TRAODOI
            inner join nguoidung nd on nd.MA_NGUOIDUNG = td.MA_NGUOIDUNG 
            WHERE td.MA_CUAHANG = ? GROUP BY td.MA_NGUOIDUNG ORDER BY td.MA_TRAODOI DESC";
        return DB::select($sql,[$mach]);
    }
    
    
    public static function list_by_nd($mand){
        $sql = "select ch.MA_CUAHANG, ch.TEN_CUAHANG, ch.HINHANH, td.NOIDUNG, td.THOIGIAN , max.TRANGTHAI, td.MA_TRAODOI, td.TRA_MA_TRAODOI  from traodoi as td
            inner join ( select MAX(MA_TRAODOI) as MA_TRAODOI, SUM(CASE WHEN TRANGTHAI=0 THEN 1 ELSE 0 END) as TRANGTHAI from  traodoi where TRA_MA_TRAODOI IS NOT NULL GROUP BY MA_NGUOIDUNG, MA_CUAHANG) as max
            on max.MA_TRAODOI = td.MA_TRAODOI
            inner join cuahang ch on ch.MA_CUAHANG = td.MA_CUAHANG 
            WHERE td.MA_NGUOIDUNG = ? GROUP BY td.MA_CUAHANG ORDER BY td.MA_TRAODOI DESC";
        return DB::select($sql,[$mand]);
    }
    
    public static function list_by_ch_nd($mach, $nguoidung){
        $sql = "select count(*) as COUNT from traodoi td WHERE td.MA_CUAHANG = ? AND td.MA_NGUOIDUNG = ? ORDER BY td.MA_TRAODOI";
        $count = DB::select($sql,[$mach, $nguoidung])[0]->COUNT;
        if ($count > 200){
            $count = $count - 200;
        }else{
            $count = 0;
        }
        $sql = "select ch.HINHANH, nd.TEN_NGUOIDUNG, td.NOIDUNG, td.THOIGIAN, td.TRA_MA_TRAODOI, ch.TEN_CUAHANG, td.FILE_1 AS FILE  from traodoi td
            inner join nguoidung nd on nd.MA_NGUOIDUNG = td.MA_NGUOIDUNG 
            inner join cuahang ch on ch.MA_CUAHANG = td.MA_CUAHANG
            WHERE td.MA_CUAHANG = ? AND td.MA_NGUOIDUNG = ? ORDER BY td.MA_TRAODOI ASC LIMIT ?, 200";
        return DB::select($sql,[$mach, $nguoidung, $count]);
    }
    
    
    public static  function tl_save($traodoi,$mand, $mach,$noidung, $thoigian, $file){
        $sql = "INSERT INTO traodoi(TRA_MA_TRAODOI,MA_NGUOIDUNG,MA_CUAHANG,NOIDUNG,THOIGIAN,FILE_1, TRANGTHAI) VALUE(?,?,?,?,?, ?, 0)";
        DB::insert($sql, [$traodoi,$mand, $mach,$noidung, $thoigian, $file]);
        return DB::select("select MAX(MA_TRAODOI) from traodoi")[0];
    }
    
    public static  function  ma_traodoi_by_ch_nd($mach, $mand){
        return DB::select("select MAX(MA_TRAODOI) as MA_TRAODOI from traodoi where  MA_CUAHANG = ? AND MA_NGUOIDUNG = ? AND TRA_MA_TRAODOI IS NULL",[$mach,$mand])[0]->MA_TRAODOI;
    }
    
    public static  function update_status($mach,$mand){
        $sql = "UPDATE traodoi set TRANGTHAI = 1 WHERE MA_CUAHANG = ? AND MA_NGUOIDUNG = ? AND TRA_MA_TRAODOI IS NOT NULL";
        DB::insert($sql, [$mach,$mand]);
    }
    
    public static function update_status_nd($mach,$mand){
        $sql = "UPDATE traodoi set TRANGTHAI = 1 WHERE MA_CUAHANG = ? AND MA_NGUOIDUNG = ? AND TRA_MA_TRAODOI IS NULL";
        DB::insert($sql, [$mach,$mand]);
    }
}
