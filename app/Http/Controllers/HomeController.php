<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function get_filename($pattern){
        if($pattern =="AH"){
            return 'AHSeriesPattern.txt';
        }
        else return 'BRSeriesPattern.txt';

    }
    public function last_result($pattern){
        $filename = $this->get_filename($pattern);
        $filesize = filesize($filename);

        if($filesize <=0){
            return "No data is stored";
        }

        if (File::exists($filename)) {
            // Read the file contents
            $contents = File::get($filename);

            // Get the last 30 characters from the file and store them in a string
            $last30Characters = substr($contents, -31);
        } else {
            echo "File does not exist.";
        }
        return $last30Characters;

    }
    public function dashboard($pattern='AH'){
        // if($pattern==null){
        //     echo $pattern;
        //     return view('dashboard', ['preview' => 'AH']);
        // }
        // else{
        //     echo $pattern;
        //     return view('dashboard', ['preview' => $pattern]);
        // }
        return view('dashboard', ['preview' => $pattern]);
    }
    public function search(){
        return view('search')->with('start','A')->with('end','H');
    }
    public function remove_last_character( $pattern){
        try{
            // $string='';
            $filename = $this->get_filename($pattern);

             // Check if the file exists
             if (File::exists($filename)) {
                 // Read the file contents
                 $filesize = filesize($filename);
                 $file = fopen($filename, 'r');

                $nullpresent=0;
                //  if (feof($file)) {
                //     $nullpresent=1;
                //  }
                 fclose($file);
                 $contents = File::get($filename);

                 if (!empty($contents)) {
                    //  $contents = substr($contents, 0, -(1 + $nullpresent));
                    $contents = substr($contents, 0, -1);
                     File::put($filename, $contents);

                     echo "Last character removed from the file.";
                 } else {
                     echo "File is empty. Nothing to remove.";
                 }
             } else {
                 echo "File does not exist.";
             }
             return'success';
        }
        catch(Exception $e){
            return 'error';
        }

    }

    public function save(Request $req)
    {
        $pattern = $req->input('pattern');
        $filename = $this->get_filename($req->input('pattern'));
        $id = $req->input('character');
        $file = fopen($filename, 'a');
        if ($file) {
            fwrite($file, $id);
            fclose($file);
            // echo "Data appended to the end of the file on the same line.";
        } else {
            // echo "Failed to open the file for appending.";
        }
        echo $pattern;


        return Redirect::route('dashboard', ['pattern' => $pattern]);
        // redirect()->route('dashboard',[$pattern]);
        // return redirect()->route('dashboard')
        // ->with('pattern','BR');
        // return redirect('dashboard', compact('pattern'));
        // $this->dashboard($pattern);
        // return redirect()->back()->with('preview',$pattern);
        // return redirect('/')->with('preview', $pattern);
        // return view('/')->with('preview', $pattern);
    }
    public function searchResult(Request $req)
    {

        $needle =  $req->input('character');
        $startPattern = $req->input('start');
        $endPattern = $req->input('end');
        if($startPattern =="A" || $endPattern=="A"){
            $filename = $this->get_filename('AH');
        }
        else {
            $filename = $this->get_filename('BR');
        }
        $text =  strtoupper($needle);
        $myfile = fopen($filename,  "r")or die("Unable to open file!");
        $filesize = filesize($filename);
        $allpos = [];
        if($filesize<=0){
            return view('search-result')->with('result', $allpos)->with('start',$startPattern)->with('end',$endPattern)->with('status',"file is empty");
        }
        $haystack = fread($myfile, $filesize);
        $offset = 0;
        $allpos = array();
        $i =0;
        $status ="No Record Found";

        while (($pos = strpos($haystack, $needle, $offset)) !== FALSE) {
            $offset   = $pos + 1;
            if($pos+30<= $filesize) $end =30;
            else $end =$filesize;
            $allpos[] = substr($haystack, $pos, $end);
            $i+=1;
            $status ="success";
            if($i==8) break;
        }

        return view('search-result')->with('result', $allpos)->with('start',$startPattern)->with('end',$endPattern)->with('status',$status);
    }


}
