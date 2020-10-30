<?php 
namespace App\Http\Controllers;
use App\Applicant;
use App\Par;
use DB;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
class MaatwebsiteController extends Controller
{
	public function exportPDF()
	{
		/* Using DomPDF Library */
		// $data = Item::all();
  //       view()->share('data',$data);
  //       if($request->has('download')){
  //           $pdf = PDF::loadView('yourView');
  //           return $pdf->download('yourView');
  //       }
  //       return view('yourView');
		/* Using Maatwebstite Library */
	   $data = Item::get()->toArray();
	   return Excel::create('lincoln-schools', function($excel) use ($data) {
		$excel->sheet('mySheet', function($sheet) use ($data)
	    {
			$sheet->fromArray($data);
	    });
	   })->download("pdf");
	}
	public function importExport()
	{
		return view('import-export.importExport');
	}
	public function downloadExcel($type)
	{
		$data = Item::get()->toArray();
		return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
	public function importExcel(Request $request)
	{
		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();

			if(!empty($data) && $data->count()) {
				foreach ($data as $key => $value) {
					if($par = Par::create(['parentfullname'=>$value->parentfullname,
						'p_contacts'=>'0'.$value->p_contacts])) {
						$insert[] = [
							's_othernames'=>$value->s_othernames,
							's_surname'=>$value->s_surname,
							's_gender'=>$value->s_gender,
							's_contacts'=>'0'.$value->s_contacts,
							's_dob'=>$value->s_dob,
							's_nationalid'=>$value->s_nationalid,
							'parent_id'=>$par->parent_id,
							's_denomination'=>$value->s_denomination,
							's_admdate'=>$value->s_admdate,
							's_graddate'=>$value->s_graddate,
							's_homeaddress'=>$value->s_homeaddress,
							's_district'=>$value->s_district,
							's_area'=>$value->s_area,
							's_approved'=>$value->s_approved,
							's_admissiontype'=>$value->s_admissiontype,
							's_emailaddress'=>$value->s_emailaddress,
							'agent_id'=>$value->agent_id,
							's_applicationno'=>Str::upper(Str::random(4)),
							'date_applied'=>$value->date_applied
						];
					}
				}
				DB::table('students')->insert($insert);
				Session::flash('import', 'Applicant(s) imported successfully!');
			}
		}
		return back();
	}
	public function importIcons (Request $request) 
	{
		if($request->hasFile('import_icons')) {
			$path = $request->file('import_icons')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();

			if(!empty($data) && $data->count()) {
				foreach ($data as $key => $value) {
					$insert[] = [
						'icon_name' => $value->icon_name,
						'icon_path' => $value->icon_path,
					];
				}
				DB::table('icons')->insert($insert); {
					return redirect('admin/settings')->with('info','Icons imported successfully!');
				}
			}
		}
		return back();
	}
}