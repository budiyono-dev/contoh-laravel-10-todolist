<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Todolist</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="pt-4 pb-4 text-center">
                <h4>Todolist</h4>
            </div>
            <div class="col-8">
                <div class="table-responsive">
                    <table class="table table-sm  table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Created At</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($todolist as $key => $t)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td class="text-start">{{ $t->name }}</td>
                                    <td class="text-start">{{ $t->description }}</td>
                                    <td class="text-start">{{ $t->created_at }}</td>
                                    <td class="d-flex justify-content-around">
                                        <button type="button" class="btn btn-primary btn-sm" 
                                        data-name="{{ $t->name }}"
                                        data-id-edit="{{ $t->id }}"
                                        data-description="{{ $t->description }}"
                                        onclick="editData(this)">
                                            Edit
                                        </button>
                                        <form method="post" autocomplete="off" action="{{ route('t.del')  }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $t->id }}">
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No Data....</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4">
                <div class="text-end mb-2 border p-3">
                    <form method="post" autocomplete="off" action="{{ route('t.add')  }}" name="todolistForm">
                        @csrf
                        <input type="hidden" name="id" id="idEdit" value="{{ $t->id }}">
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Todo</label>
                          <input type="text" name="name" id="name" class="form-control" id="exampleFormControlInput1" placeholder="apa yang anda ingin lakukan?">
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Description</label>
                          <input type="text" name="description" id="description" class="form-control" id="exampleFormControlInput1" placeholder="deskripsi?">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="text" class="btn btn-primary w-100" id="btnAdd">Add</button>
                            <button type="text" class="btn btn-danger w-100 d-none" id="btnCancle"
                            onclick="return cancleEdit(this); " 
                            >Cancle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
<script type="text/javascript">
    let actionAdd = {!! json_encode(route('t.add'))  !!};
    let actionEdit = {!! json_encode(route('t.edit'))  !!};
    function editData(el) {
        document.getElementById('btnAdd').innerHTML = 'Save';
        document.getElementById('name').value = el.dataset.name;
        document.getElementById('description').value = el.dataset.description;
        document.getElementById('idEdit').value = el.dataset.idEdit;
        document.getElementById('btnCancle').classList.remove('d-none');
        document.todolistForm.action = actionEdit;
    }
    function cancleEdit(el) {
        document.todolistForm.reset();
        document.getElementById('btnAdd').innerHTML = 'Add';
        document.getElementById('btnCancle').classList.add('d-none');
        document.todolistForm.action = actionAdd;
        return false;
    }
</script>
</html>