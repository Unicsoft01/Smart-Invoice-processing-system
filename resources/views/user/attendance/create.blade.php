<x-app-layout>
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Mark Attendance</h3>
                    </div>
                </div>
            </div>

            <!-- Row end  -->

            <div class="row align-item-center">
                <div class="col-md-8 mx-auto">
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Welcome back Dear, {{ Auth::User()->name }}</h6>
                        </div>
                        <div class="card-body">

                            <form method="post" action="{{ route('attendance.store') }}">
                                @csrf
                                {{-- @method('POST') --}}

                                <div class="row g-3 align-items-center">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Webcam/hardware Not detected!</strong> kindly use the fields below
                                        instead, your attendance will be proceed automatically.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="course" class="form-label">Select a Course</label>
                                        <select name="course" class="form-control" id="course" required="">
                                            @foreach ($loadCourses as $item)
                                                <option value="{{ $item->course_code }}">{{ $item->course_code }} -
                                                    {{ $item->course_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="name" class="form-control" value="{{ Auth::User()->name }}">
                                    <input type="hidden" name="user_id" class="form-control" value="{{ Auth::User()->id }}">
                                    <input type="hidden" name="matNo" class="form-control" value="{{ Auth::User()->matNo }}">

                                    <div class="col-md-6">
                                        <label class="form-label">Attendance type</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                                        id="exampleRadios11" value="class attendance" checked="">
                                                    <label class="form-check-label" for="exampleRadios11">
                                                        Class Attendance
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                                        id="exampleRadios22" value="exam attendance">
                                                    <label class="form-check-label" for="exampleRadios22">
                                                        Exam Attendance
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <label for="addnote" class="form-label">Add Note</label>
                                        <textarea class="form-control" id="addnote" rows="3"></textarea>
                                    </div> --}}
                                </div>

                                {{-- <div class="col-md-12"> --}}
                                <button type="submit" class="btn btn-primary mt-4 rounded-pill"
                                    style="height: 70px; width: 50%; margin-left: 25%;">Mark Attendance</button>
                                {{-- </div> --}}
                            </form>
                        </div>
                    </div>

                </div>
            </div><!-- Row end  -->
        </div>
    </div>

    <script language="JavaScript">
        Webcam.set(
            width: 490,
            height: 350,
            image_format: 'jpeg',
            jpeg_quality: 90
        );

        Webcam.attach('#my_camera');

        function take_snapshot()
        Webcam.snap(function(data_uri) $(".image-tag").val(data_uri); document.getElementById('results').innerHTML =
            '<img src="' + data_uri + '"/>';
        );
    </script>
</x-app-layout>
