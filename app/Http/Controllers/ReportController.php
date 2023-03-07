use PDF;

class ReportController extends Controller
{
    public function geraPdf(){

        $pdf =PDF::loadView('pdf');

        return $pdf->setPaper('a4')->stream('serviços.pdf');
    }

    public function index(){
        return view('reports.reportsIndex');
    }

    public function totalServices(){

        $services = DB::table('attendance')
        ->join('schedules','attendance.schedules_id','schedules.id')
        ->join('services_schedules','services_schedules.schedules_id','schedules.id')
        ->join('services','services.id','services_schedules.service_id')
        ->where('attendance.is_finished',1)
        ->select('services.name as name',
            DB::raw('count(services.id) as qtd '))
         ->groupBy('services.name')
         ->orderByDesc('qtd')
         ->get()
         ->toArray();    

         $teste = Carbon::now();
         
            

         $pdf =PDF::loadView('reports.servicesTotalReport',compact('services'));

        return $pdf->setPaper('a4')->stream('serviços.pdf');
    }

    public function totalServicesByOperators()
    {

        $services = DB::table('attendance')
        ->join('users', 'users.id', 'attendance.operator_id')
        ->where('attendance.is_finished', 1)
        ->select(
            'users.name',
            DB::raw('count(users.name) as qtd ')
        )
            ->groupBy('users.name')
            ->orderByDesc('qtd')
            ->get()
            ->toArray();

        $pdf = PDF::loadView('reports.servicesTotaByOperatorsReport', compact('services'));

        return $pdf->setPaper('a4')->stream('serviços.pdf');
    }
