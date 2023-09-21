@extends('pages.admin.layouts.app')
@push('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/table/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/table/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/table/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <style>
    .dataTables_wrapper .dataTable .btn {
        padding: 1rem 1rem;
    }
</style>
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="header">
                            <h3>Withdraw Controll</h3>
                            <p>Data User</p>
                        </div>
                        <div class="body">

                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">No</th>
                                            <th>Mitra </th>
                                            <th>Nominal</th>
                                            <th>Bank</th>
                                            <th>Rekening</th>
                                            <th>Nama Pemilik Rekening</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach($withdraws as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->bank->user->name }}</td>
                                            <td>{{ $data->nominal }}</td>
                                            <td>{{ $data->bank->bank_name }}</td>
                                            <td>{{ $data->bank->bank_nomer_rekening }}</td>
                                            <td>{{ $data->bank->bank_name_user }}</td>
                                            <td class="font-weight-medium">
                                                @if($data->status == 'diajukan')
                                                    <div class="badge badge-info">Diajukan</div>
                                                @elseif($data->status == 'proses')
                                                    <div class="badge badge-warning">Proses</div>
                                                @elseif($data->status == 'sukses')
                                                <div class="badge badge-success">Sukses</div>
                                                @endif
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('admin.update.withdraw', ['withdraw_id' => $data->withdraw_id]) }}">
                                                    @csrf
                                                    @method('PUT') <!-- Add the method field -->
                                                    <select class="form-control" name="withdraw[{{ $data->withdraw_id }}]" onchange="handleSelectChange(this, {{ $data->withdraw_id }})">
                                                        <option value="diajukan" @if($data->status === 'diajukan') selected="selected" @endif>Diajukan</option>
                                                        <option value="proses" @if($data->status === 'proses') selected="selected" @endif>Proses</option>
                                                        <option value="sukses" @if($data->status === 'sukses') selected="selected" @endif>Sukses</option>
                                                    </select>
                                                </form>
                                            </td>                                                                                    
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- content-wrapper ends -->
    {{-- @include('admin.layout.footer') --}}
    @foreach ($withdraws as $data)
    <div class="modal fade" id="update{{ $data->withdraw_id }}">
        <div class="modal-dialog">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title text-white">{{ $data->bank->user->name}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-white">Apakah Anda Ingin Mengubah Status Withdraw {{ $data->status }} dari {{ $data->bank->user->name}} menjadi  <span id="selectedStatus{{ $data->withdraw_id }}"></span>?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <!-- Remove the link, as we will submit the form programmatically -->
                    <button type="button" class="btn btn-outline-light text-dark" data-dismiss="modal">Close</button>
                    <!-- Add an ID to the submit button -->
                    <button id="submitBtn{{ $data->withdraw_id }}" type="button" class="btn btn-outline-light text-dark" onclick="updateStatus({{ $data->withdraw_id }})">Yes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach
    <script>
        function handleSelectChange(selectElement, withdrawId) {
            var selectedOption = selectElement.value;
            // Show modal by ID
            $('#update' + withdrawId).modal('show');

            // Set the selected option text in the modal
            var selectedOptionText = selectElement.options[selectElement.selectedIndex].text;
            $('#selectedStatus' + withdrawId).text(selectedOptionText);
        }

        function updateStatus(withdrawId) {
            var selectedOption = $('select[name="withdraw[' + withdrawId + ']"]').val();
            var formData = new FormData();
            formData.append('_method', 'PUT'); // Add the method field
            formData.append('withdraw[' + withdrawId + ']', selectedOption);

            fetch("{{ url('admin/update/withdraw') }}" + '/' + withdrawId, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Reload the page to reflect the updated data
                    location.reload();
                } else {
                    alert('Failed to update status. Please try again.');
                }
            })
            .catch(error => {
                alert('An error occurred while updating status. Please try again.');
                console.error('Error:', error);
            });
        }
    </script>
@endsection
@push('scripts')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
    <script src="{{ asset('all/vendors/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('all/vendors/bundles/vendorscripts.bundle.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('admin/table/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/table/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/table/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/table/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/table/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/table/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/table/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('admin/table/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/table/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/table/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/table/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/table/datatables-buttons/js/buttons.colVis.min.js') }}"></script>




    <!-- page js file -->
    {{-- <script src="{{ asset('all/vendor/bundles/mainscripts.bundle.js') }}"></script> --}}
    <script src="{{ asset('all/vendors/bundles/jquery-datatable.js') }}"></script>
@endpush