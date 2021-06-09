<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           สวัสดี , {{Auth::User()->name}}
           <br>
           จำนวนทั้งหมด {{count($userr)}} คน
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">Email</th>
                            <th scope="col">เริ่มสมัครครั้งแรก</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach ($userr as $row)
                            <tr>
                                <th>{{$i++}}</th>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{Carbon\Carbon::parse($row->created_at)->diffforHumans()}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>
