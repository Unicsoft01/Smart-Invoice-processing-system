<link rel="stylesheet" href="{{ url('/') }}/assets/plugin/datatables/responsive.dataTables.min.css">
<link rel="stylesheet" href="{{ url('/') }}/assets/plugin/datatables/dataTables.bootstrap5.min.css">

<x-app-layout>
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center g-3 mb-3">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Time and Attendance</h3>
                    </div>
                </div>
            </div>
            
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="myProjectTable" class="table table-hover align-middle mb-0 text-center"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>verified Image</th>
                                        <th>Course</th>
                                        <th>Date</th>
                                        <th>Attendance Type</th>
                                        <th>Time in</th>
                                        <th>Attence</th>
                                        <th>remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                             
                                    @foreach ($attendance as $itiration => $attend)
                                    @if (Auth::User()->id === $attend->user_id)
                                    <tr>
                                        <td>{{ $itiration + 1 }}</td>
                                        <td>
                                            <img src="{{ url('/') }}/assets/images/xs/{{ $attend->imageUrl }}"
                                                alt="{{ $attend->studentName }}" style="width:40px; height:30px; ">
                                        </td>
                                        {{-- <td>{{ $attend->studentName }}</td> --}}
                                        {{-- <td>{{ $attend->studentMat }}</td> --}}
                                        <td>{{ $attend->course }}</td>
                                        <td>{{ $attend->created_at }}</td>
                                        <td>{{ $attend->attendanceType }}</td>
                                        <td>{{ $attend->created_at }}</td>
                                        @if ($attend->inAttendance === 'yes')
                                            <td><i class="icofont-check-circled text-success"></i></td>
                                        @else
                                            <td><i class="icofont-close-circled text-danger"></i></td>
                                        @endif
                                        <td class="text-success">{{ $attend->score }}</td>

                                        {{-- <td class="text-success fw-bold">On time</td> --}}
                                    </tr>
                                    
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- Row End -->
        </div>
    </div>
</x-app-layout>

<!-- Plugin Js -->
<script src="{{ url('/') }}/assets/bundles/apexcharts.bundle.js"></script>
<script src="{{ url('/') }}/assets/bundles/dataTables.bundle.js"></script>

<!-- Jquery Page Js -->
{{-- <script src="../js/template.js"></script> --}}
<script>
    // project data table
    $(document).ready(function() {
        $('#myProjectTable')
            .addClass('nowrap')
            .dataTable({
                responsive: true,
                columnDefs: [{
                    targets: [-1, -3],
                    className: 'dt-body-right'
                }]
            });
    });
    // employees Line Column
    $(document).ready(function() {
        var options = {
            chart: {
                height: 350,
                type: 'line',
                toolbar: {
                    show: false,
                },
            },
            colors: ['var(--chart-color1)', 'var(--chart-color2)'],
            series: [{
                name: 'Working Hours',
                type: 'column',
                data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160]
            }, {
                name: 'Employees Progress',
                type: 'line',
                data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16]
            }],
            stroke: {
                width: [0, 4]
            },
            //labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],    
            labels: ['2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011',
                '2012'
            ],
            xaxis: {
                type: 'datetime'
            },
            yaxis: [{
                title: {
                    text: 'Working Hours',
                },

            }, {
                opposite: true,
                title: {
                    text: 'Employees Progress'
                }
            }]
        }
        var chart = new ApexCharts(
            document.querySelector("#apex-chart-line-column"),
            options
        );

        chart.render();
    });

    // employees circle
    $(document).ready(function() {
        var options = {
            chart: {
                height: 250,
                type: 'radialBar',
            },
            colors: ['var(--chart-color1)'],
            plotOptions: {
                radialBar: {
                    hollow: {
                        size: '70%',
                    }
                },
            },
            series: [70],
            labels: ['Working'],
        }
        var chart = new ApexCharts(
            document.querySelector("#apex-circle-chart"),
            options
        );

        chart.render();
    });
</script>
