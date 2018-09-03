@extends('layouts.app')


@section('content')

    <div class="container" style="margin-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{var_dump(Session::get('sponsor'))}}<br>

                    <div class="card-header" style="font-weight: bold;background-color: aquamarine;">New card holders - {{print_r($sponsor = \App\Country::getName(Session::get('sponsor')))}}</div>
                    <div class="card-body">

                    </div>

                    <table style="width: 67%; margin: 30px auto 50px;" cellspacing="0" cellpadding="3" border="0">
                        <thead>
                        <tr>
                            <th style="text-align:center">Target</th>
                            <th style="text-align:center">Search text</th>
                            <th style="text-align:center">Use smart search</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr id="filter_col3" data-column="2">
                            <td style="text-align:center">Column - Action Ref</td>
                            <td style="text-align:center"><input class="column_filter" id="col2_filter" type="text"></td>
                            <td style="text-align:center"><input class="column_filter" id="col2_smart" checked="checked" type="checkbox"></td>
                        </tr>
                        <tr id="filter_col4" data-column="3">
                            <td style="text-align:center">Column - CHO Code</td>
                            <td style="text-align:center"><input class="column_filter" id="col3_filter" type="text"></td>
                            <td style="text-align:center"><input class="column_filter" id="col3_smart" checked="checked" type="checkbox"></td>
                        </tr>
                        <tr id="filter_col5" data-column="4">
                            <td style="text-align:center">Column - Client Code</td>
                            <td style="text-align:center"><input class="column_filter" id="col4_filter" type="text"></td>
                            <td style="text-align:center"><input class="column_filter" id="col4_smart" checked="checked" type="checkbox"></td>
                        </tr>
                        <tr id="filter_col7" data-column="6">
                            <td style="text-align:center">Column - First Name</td>
                            <td style="text-align:center"><input class="column_filter" id="col6_filter" type="text"></td>
                            <td style="text-align:center"><input class="column_filter" id="col6_smart" checked="checked" type="checkbox"></td>
                        </tr>
                        </tbody>
                    </table>

            <table class="uk-table uk-table-hover uk-table-striped" id="cho-table" style="width: 100%;">
            <thead>
            <tr>
                <th></th>
                <th>Status</th>
                <th>Action Ref</th>
                <th>CHO Code</th>
                <th>Client code</th>
                <th>CHO Title</th>
                <th>CHO FName</th>
            </tr>
            </thead>
        </table>

        </div>
        </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
        function format ( d ) {
            return 'ID: '+d.id+'<br>'+
                'Full name: '+d.cho_first_name+' '+d.cho_last_name+'<br>'+
                'Sponsor code: '+d.sponsor_code+'<br>'+
                'DOB: '+d.cho_dob+'<br>'+
                'Add line 1: '+d.cho_add_line_1+'<br>'+
                'Add line 2: '+d.cho_add_line_2+'<br>'+
                'Add town: '+d.cho_add_town+'<br>'+
                'Add postcode: '+d.cho_add_postcode+'<br>'+
                'Country: '+d.cho_country+'<br>'+
                'Employee ref: '+d.cho_employee_ref+'<br>'+
                'Result code: '+d.result_code+'<br>'+
                'Result detail: '+d.result_detail+'<br>'+
                'Created at: '+d.created_at+'<br>';
        }

        function filterColumn ( i ) {
            $('#cho-table').DataTable().column( i ).search(
                $('#col'+i+'_filter').val(),
                $('#col'+i+'_regex').prop('checked'),
                $('#col'+i+'_smart').prop('checked')
            ).draw();
        }

        $(document).ready(function() {
            var dt = $('#cho-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                dom: 'B<\'#colvis row\'><\'row\'><\'row\'<\'col-md-6\'l><\'col-md-6\'f>r>tip',
                buttons: [ {extend: 'excelHtml5', text: 'Export'}],
                ajax: '{!! route('newcardholder.get',Session::get('sponsor')) !!}',
                columns: [
                    {
                        orderable: false,
                        class: "details-control",
                        data: null,
                        defaultContent: ""
                    },
                    { data: 'status' , name: 'status'},
                    { data: 'action_ref', name: 'action_ref' },
                    { data: 'cho_code', name: 'cho_code' },
                    { data: 'client_code', name: 'client_code' },
                    { data: 'cho_title', name: 'cho_title' },
                    { data: 'cho_first_name', name: 'cho_first_name' }
                ]
            });

            $('input.column_filter').on( 'keyup click', function () {
                filterColumn( $(this).parents('tr').attr('data-column') );
            } );

            var detailRows = [];

            $('#cho-table tbody').on( 'click', 'tr td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = dt.row( tr );
                var idx = $.inArray( tr.attr('id'), detailRows );

                if ( row.child.isShown() ) {
                    tr.removeClass( 'details' );
                    row.child.hide();

                    // Remove from the 'open' array
                    detailRows.splice( idx, 1 );
                }
                else {
                    tr.addClass( 'details' );
                    row.child( format( row.data() ) ).show();

                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }
                }
            } );


            dt.on( 'draw', function () {
                $.each( detailRows, function ( i, id ) {
                    $('#'+id+' td.details-control').trigger( 'click' );
                } );
            } );

        });

    </script>
@endsection