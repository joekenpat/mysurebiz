<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\User;
use Illuminate\Http\Request;
use App\General\General;

class ManageAccountController extends Controller
{
    public function Index(Request $request, $type = '')
    {
    	$isPost = $request->isMethod('post');
    	if($isPost) $users = User::where('email', $request->email)->paginate(20);
    	else {
		    $users = User::when($type, function ($query) use ($type){

			    $audience = General::getAudienceId($type);
		    	return $query->where('role', $audience);
		    })->paginate(20);
	    }

    	$batches = Batch::all(['id', 'name']);
	    $title = $isPost ? "Search for '".$request->email."'" : "Manage ${type} Accounts";

        return view('manage_users_account',
	        ['users' => $users, 'type' => ucfirst($type), 'title' => $title, 'batches' => $batches]);
    }

    public function searchByType(Request $request)
    {
        $searchType = $request->searchtype;
        $audienceId = strtolower($request->type) === "all" ? -1 : General::getAudienceId($request->type);
        switch ($searchType) {
            case 'phone':
                $users = User::where('phone', $request->phone);
                $title = "Search for '".$request->phone."'";
                break;
            case 'batch':
                $users = User::where('batch_id', $request->batch);
                $title = "Search for ' Batch ".$request->batch."'";
                break;
            case 'email':
                $users = User::where('email', $request->email);
                $title = "Search for '".$request->email."'";
        }

        if ($audienceId > 0) {
            $users = $users->where('role', $audienceId);
        }

        $users = $users->paginate(200);

        $batches = Batch::all(['id', 'name']);

        return view('manage_users_account',
            ['users' => $users, 'type' => ucfirst($request->type), 'title' => $title, 'batches' => $batches]);
    }

    public function UpdateUserStatus(Request $request)
    {
        $request->validate([
            'action' => 'required|in:1,2',
            'id' => 'required'
        ]);

        $user = User::where('id', $request->id)->first();
        $user->status = $request->action;
        $user->save();

    }
    public function DeleteUser(Request $request)
    {
        User::where('id', $request->id)->delete();
    }

    public function getPhoneNumbers($type, $status)
    {
	    $audienceId = strtolower($type) === "all" ? -1 : General::getAudienceId($type);
	    $title = [$type.' Contacts'];
	    $phoneArr = User::when($audienceId, function ($query) use ($audienceId, $status){

	        if ($audienceId > 0) {
	            $query = $query->where('role', $audienceId);
            }

	        switch ($status) {
                case 'unverified':
                    return $query->where('status', 0);
                case 'verified':
                    return $query->where('status', 1);
                default:
                    return $query;
            }
	    })->select('phone')->get()->toArray();
	    $this->OutputCsv($type.'-contacts.csv', $title, $phoneArr);
    }

    public function getPhoneNumbersByBatch($type, $batchId)
    {
        $audienceId = strtolower($type) === "all" ? -1 : General::getAudienceId($type);
        $title = [$type.' Users'];
        $result = User::when($audienceId, function ($query) use ($audienceId, $batchId){

            if ($audienceId > 0) {
                $query = $query->where('role', $audienceId);
            }

            return $query->where('batch_id', $batchId);

        })->select('phone', 'email')->get()->toArray();

        $phoneArr = [];
        $emailArr = [];
        foreach ($result as $data) {
            $phoneArr[] = [$data['phone']];
            $emailArr[] = [$data['email']];
        }

        $contacts = array_merge($phoneArr, $emailArr);

        $this->OutputCsv($type.'-contacts-phone.csv', $title, $contacts);
    }

    private function OutputCsv($fileName, $title, Array $contentArr)
    {
	    header('Pragma: public');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Cache-Control: private', false);
	    header('Content-Type: text/csv');
	    header('Content-Disposition: attachment;filename=' . $fileName);

	    $file = fopen('php://output',"w");

	    $i = 0;
	    fputcsv($file, $title);
	    foreach ($contentArr as $c)
	    {
		    fputcsv($file, $c);
		    $i++;
		    
	    }

	    fclose($file);
    }
}
