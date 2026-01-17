<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Career;
use App\Models\ContactRequest;
use App\Models\Device;
use App\Models\NewsletterSubscription;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class DatatablesController extends Controller
{
    public function getAccounts()
    {

        $accounts = Account::all();

        return Datatables::of($accounts)

            ->editColumn('avatar', function ($accounts) {
                return '<a href="' . url('dashboard/accounts/' . $accounts->id) . '"><img src="' . asset('/uploads/avatars/' . $accounts->avatar) . '" style="height:50px;width: 50px;" class="avatar-img rounded-circle" alt="Account Avatar"></a>';
            })

            ->editColumn('role', function ($accounts) {
                $role = strtolower($accounts->user->role ?? 'unknown');

                $roleColors = [
                    'admin'    => 'badge-danger',
                    'student'  => 'badge-primary',
                    'academy'  => 'badge-info',
                    'center' => 'badge-warning',
                    'unknown'  => 'badge-secondary',
                ];

                $colorClass = $roleColors[$role] ?? 'badge-secondary';
                $label = ucfirst($role);

                return '<span class="badge ' . $colorClass . '">' . $label . '</span>';
            })

            ->editColumn('status', function ($accounts) {
                return '<span class="badge badge-success">' . $accounts->status . '</span>';
            })

            ->addColumn('actions', function ($accounts) {

                $editBtn = '';
                $deleteBtn = '';

                if (auth::user()->role == 'admin') {

                    $showBtn = '<a class="btn btn-primary" href="' . url('dashboard/accounts/' . $accounts->id) . '"><i class="fas fa-eye"></i></a>';
                    $editBtn = '<a class="btn btn-info" href="' . url('dashboard/accounts/' . $accounts->id . '/edit') . '"><i class="fas fa-pencil-alt"></i></a>';
                    $deleteBtn = '
    <a class="btn btn-danger btn-delete"
       href="#"
       onclick="confirmDelete(' . $accounts->id . '); return false;">
       <i class="fas fa-trash"></i>
    </a>

    <!-- Hidden Delete Form -->
    <form id="delete-account-' . $accounts->id . '" 
          action="' . url('dashboard/accounts/' . $accounts->id) . '" 
          method="POST" style="display:none;">
        ' . csrf_field() . '
        ' . method_field('DELETE') . '
    </form>
';
                }

                $buttons = '<div class="btn-group btn-group-sm">' . $showBtn . $editBtn . $deleteBtn . '</div>';

                return $buttons;
            })

            ->rawColumns(['avatar', 'role', 'status', 'actions'])
            ->make(true);
    }

    public function getDevices()
    {

        $devices = Device::all();

        return Datatables::of($devices)

            ->editColumn('avatar', function ($devices) {
                return '<a href="' . url('dashboard/devices/' . $devices->id) . '"><img src="' . asset('/uploads/products/' . $devices->avatar) . '" style="height:50px;width: 50px;" class="avatar-img rounded-circle" alt="Account Avatar"></a>';
            })

            ->editColumn('status', function ($devices) {
                return '<span class="badge badge-success">' . $devices->status . '</span>';
            })

            ->addColumn('actions', function ($devices) {

                $editBtn = '';
                $deleteBtn = '';

                if (auth::user()->role == 'admin') {

                    $showBtn = '<a class="btn btn-primary" href="' . url('dashboard/devices/' . $devices->id) . '"><i class="fas fa-eye"></i></a>';
                    $editBtn = '<a class="btn btn-info" href="' . url('dashboard/devices/' . $devices->id . '/edit') . '"><i class="fas fa-pencil-alt"></i></a>';
                    $deleteBtn = '
    <a class="btn btn-danger btn-delete"
       href="#"
       onclick="confirmDelete(' . $devices->id . '); return false;">
       <i class="fas fa-trash"></i>
    </a>

    <!-- Hidden Delete Form -->
    <form id="delete-device-' . $devices->id . '" 
          action="' . url('dashboard/devices/' . $devices->id) . '" 
          method="POST" style="display:none;">
        ' . csrf_field() . '
        ' . method_field('DELETE') . '
    </form>
';
                }

                $buttons = '<div class="btn-group btn-group-sm">' . $showBtn . $editBtn . $deleteBtn . '</div>';

                return $buttons;
            })

            ->rawColumns(['avatar', 'status', 'actions'])
            ->make(true);
    }

    public function getAccountDocuments($accountID)
    {

        if (auth()->id() != Account::find($accountID)->user->id && !auth()->user()->hasRole('admin')) {
            return [];
        }

        $documents = Account::find($accountID)->documents();

        return Datatables::of($documents)
            ->editColumn('file_path', function ($doc) {
                $fileUrl = asset('uploads/documents/' . $doc->file_path);
                $extension = pathinfo($doc->path, PATHINFO_EXTENSION);

                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                    return "<a href='{$fileUrl}' target='_blank'>
                                <img src='{$fileUrl}' alt='Document' width='60' height='60' style='object-fit:cover;border-radius:8px;'>
                            </a>";
                } elseif ($extension === 'pdf') {
                    return "<a href='{$fileUrl}' target='_blank' class='btn btn-primary'>
                                <i class='fas fa-eye'></i>
                            </a>";
                } else {
                    return "<a href='{$fileUrl}' target='_blank' class='btn btn-primary'>
                                <i class='fas fa-eye'></i>
                            </a>";
                }
            })
            ->addColumn('actions', function ($documents) {

                $editBtn = '<a class="btn btn-info" href="' . url('dashboard/documents/' . $documents->id . '/edit') . '"><i class="fas fa-pencil-alt"></i></a>';
                $deleteBtn = '
    <a class="btn btn-danger btn-delete"
       href="#"
       onclick="confirmDelete(' . $documents->id . '); return false;">
       <i class="fas fa-trash"></i>
    </a>

    <!-- Hidden Delete Form -->
    <form id="delete-document-' . $documents->id . '" 
          action="' . url('dashboard/documents/' . $documents->id) . '" 
          method="POST" style="display:none;">
        ' . csrf_field() . '
        ' . method_field('DELETE') . '
    </form>
';

                $buttons = '<div class="btn-group btn-group-sm">' . $editBtn . $deleteBtn . '</div>';

                return $buttons;
            })

            ->rawColumns(['file_path', 'actions'])
            ->make(true);
    }

    public function getCareerAppliedStudents($careerID)
    {
        $career = Career::findOrFail($careerID);

        $accounts = $career->applicants()
            ->select('accounts.id', 'accounts.avatar', 'accounts.name', 'accounts.summary');

        return Datatables::of($accounts)

            ->editColumn('avatar', function ($accounts) {
                return '<a href="' . url('dashboard/accounts/' . $accounts->id) . '"><img src="' . asset('/uploads/avatars/' . $accounts->avatar) . '" style="height:50px;width: 50px;" class="avatar-img rounded-circle" alt="Account Avatar"></a>';
            })
            ->addColumn('actions', function ($accounts) {


                $showBtn = '<a class="btn btn-primary" href="' . url('dashboard/accounts/' . $accounts->id) . '"><i class="fas fa-eye"></i></a>';
                $buttons = '<div class="btn-group btn-group-sm">' . $showBtn . '</div>';
                return $buttons;
            })

            ->rawColumns(['avatar', 'actions'])
            ->make(true);
    }

    public function getJobApplications()
    {
        $applications = auth()->user()->account
            ->jobApplications()
            ->with(['account', 'career']) // eager load to avoid N+1
            ->get();

        return Datatables::of($applications)

            ->editColumn('avatar', function ($application) {
                $avatar = $application->account->avatar ?? 'avatar.png';

                return '<a href="' . url('dashboard/accounts/' . $application->account->id) . '">
                <img src="' . asset('uploads/avatars/' . $avatar) . '"
                     style="height:50px;width:50px;border-radius:50%;object-fit:cover;">
            </a>';
            })

            ->addColumn('name', function ($application) {
                return '<a href="' . url('dashboard/accounts/' . $application->account->id) . '">' .
                    e($application->account->name) .
                    '</a>';
            })

            ->addColumn('career_name', function ($application) {
                return '<a href="' . url('dashboard/careers/' . $application->career->id) . '">' .
                    e($application->career->title) .
                    '</a>';
            })

            ->addColumn('actions', function ($application) {

                $acceptUrl = url('dashboard/applications/' . $application->id . '/accept');
                $rejectUrl = url('dashboard/applications/' . $application->id . '/reject');

                return '
        <div class="btn-group btn-group-sm">

            <button class="btn btn-success btn-accept"
                data-id="' . $application->id . '">
                <i class="fas fa-check"></i> Accept
            </button>

            <button class="btn btn-danger btn-reject"
                data-id="' . $application->id . '">
                <i class="fas fa-times"></i> Reject
            </button>

        </div>
    ';
            })


            ->rawColumns(['avatar', 'name', 'career_name', 'actions'])
            ->make(true);
    }

    public function getContactRequests()
    {

        $requests = ContactRequest::all();

        return Datatables::of($requests)

            ->addColumn('avatar', function ($requests) {

                $account = $requests->account;

                if (!auth()->check() || !$account) {
                    return '<div class="avatar-anon">Anonymous</div>';
                }

                return '<a href="' . url('dashboard/accounts/' . $requests->account->id) . '"><img src="' . asset('/uploads/avatars/' . $requests->account->avatar) . '" style="height:50px;width: 50px;" class="avatar-img rounded-circle" alt="Account Avatar"></a>';
            })

            ->addColumn('name', function ($requests) {

                $account = $requests->account;

                if (!auth()->check() || !$account) {
                    return '<div class="avatar-anon">Anonymous</div>';
                }

                return '<a href="' . url('dashboard/accounts/' . $requests->account->id) . '">' .
                    e($requests->account->name) .
                    '</a>';
            })

            ->editColumn('type', function ($requests) {
                $type = strtolower($requests->type ?? 'unknown');

                $typeColors = [
                    'trade_in'    => 'badge-danger',
                    'support'  => 'badge-primary',
                    'contact'  => 'badge-info'
                ];

                $colorClass = $typeColors[$type] ?? 'badge-secondary';
                $label = ucfirst($type);

                return '<span class="badge ' . $colorClass . '">' . $label . '</span>';
            })


            ->addColumn('actions', function ($requests) {


                $showBtn = '<a class="btn btn-primary" href="' . url('dashboard/contactRequests/' . $requests->id) . '"><i class="fas fa-eye"></i></a>';
                $buttons = '<div class="btn-group btn-group-sm">' . $showBtn . '</div>';

                return $buttons;
            })

            ->rawColumns(['avatar', 'name', 'type', 'actions'])
            ->make(true);
    }

        public function getSubscribtions()
        {

        $requests = NewsletterSubscription::all();
        return Datatables::of($requests)
        ->make(true);
         }
}
