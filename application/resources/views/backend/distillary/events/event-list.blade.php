@extends('master-layouts.backend.master-layouts')

@section('additional-css')
    <link href="{{ asset('assets/backend/switchery/switchery.css') }} " rel="stylesheet">

@endsection
@section('main-content')

    <div class="br-mainpanel" id="app">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('dashboard') }}">Home</a>
                <span class="breadcrumb-item active">Event List</span>


            </nav>
        </div>
        <div class="br-pagetitle">
            <div class="br-pagebody">
                <div class="br-section-wrapper">
                    <div class="">
                        <h4>Event List</h4>

                        <a href="{{ route('backend.eventCreate') }}" class="btn btn-success"> Add New</a>


                        <hr>
                    </div>
                    <div class="table-wrapper">
                        <table id="tableList" class="table display responsive nowrap datatable1">
                            <thead>
                            <tr>
                                <th class="wd-5p">S No.</th>
                                <th class="wd-15p">Event Name</th>
                                <th class="wd-15p">Background Photo</th>
                                <th class="wd-15p">location</th>
                                <th class="wd-15p">Date</th>
                                <th class="wd-15p"> Description</th>
                                <th class="wd-15p"> Photo</th>
                                <th class="wd-25p">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($eventListData as $event)
                                <tr>
                                    <td>{{$eventListIndex++}}</td>
                                    <td>{{$event->eventname}}</td>
                                    <td><img src="{{ asset('uploads/event-photos/'.$event->bg_photo) }}" alt="" style="width:150px;"></td>
                                    <td>{{$event->address}}</td>
                                    <td>{{$event->date}}</td>
                                    <td>{{$event->description}}</td>
                                    <td><img src="{{ asset('uploads/event-photos/'.$event->photo) }}" alt="" style="width:150px;"></td>








                                    <td width="200px">
                                        <a href="{{ route('backend.editEventDetail',$event->id) }}"
                                           class="btn btn-sm shadow-1 btn-success" >Update
                                        </a>
                                        |
                                        <a href="#" @click.prevent='setEventIdForDelete({{$event->id}})' class="btn btn-sm shadow-1 btn-warning event-delete"
                                           data-toggle="modal" data-target="#event-first-delete-model"> Delete</a>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- table-wrapper -->

                </div>
                <!-- br-section-wrapper -->
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="event-first-delete-model" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5>Do you really want to delete this item?</h5>
                    </div>
                    <div class="modal-footer">
                        <form :action="deleteUrl" method="get" style="display:inline;">
                            {{csrf_field()}}
                            {{ method_field('DELETE')}}
                            <button type='submit' class="btn btn-success ">Yes</button>
                            <button type="button" class="btn btn-warning " data-dismiss="modal">No
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        {{--model for Edit slider-first--}}



    </div>
@endsection

@section('additional-js')

    <script src="{{ asset('vue-js-project-files/backend/event/code.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

    <script>
        $('.datatable1').DataTable({});
    </script>



@endsection