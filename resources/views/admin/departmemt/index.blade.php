<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           สวัสดี , {{Auth::User()->name}}
           <br>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if (session("success"))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <div class="card">
                        <div class="card-header"> ตารางข้อมูลแผนก </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อแผนก</th>
                                    <th scope="col">USER</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all as $row)
                                    <tr>
                                        <th>{{$all->firstItem()+$loop->index}}</th>
                                        <td>{{$row->department_name}}</td>
                                        <td>{{$row->user->name}}</td>
                                        {{-- <td>{{Carbon\Carbon::parse($row->created_at)->diffforHumans()}}</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$all->links()}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> แบบฟอร์ม </div>
                        <div class="card-body">
                            <form action="{{route('adddepartment')}}" method="post">
                                @csrf
                                <div class="form-group">
                                <label for="departmemt_name">ชื่อแผนก</label>
                                <input type="text" class="form-control" name="department_name">
                                </div>
                                @error('department_name')
                                <div class="my-2">
                                    <span class="text-danger">{{$message}}</span>
                                </div>
                                @enderror
                                <br>
                                <input type="submit" class="btn btn-primary" value="บันทึก">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
