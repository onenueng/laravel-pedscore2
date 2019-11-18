<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'year',
        'subject'
    ];


    public function getSubjectName(){//แสดงType ที่เป็นตัวเลขให้เป็นชื่อตามที่เราตั้งไว้
        switch($this->subject){
            case 1 :
                return "CRQ";
                break;
            case 2 :
                return "MCQ";
                break;
            case 3 :
                return "OSCE";
                break;
            case 4 :
                return "CRQ Board";
                break;
            case 5 :
                return "MCQ Board";
                break;
            case 6 :
                return "OSCE Board";
                break;
            case 7 :
                return "PIE";
                break;
            default :
                return "Unknow";
                break;
        }
    }
}
