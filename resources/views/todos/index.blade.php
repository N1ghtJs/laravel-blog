@extends('layouts.app_imax')

@section('title', "TODO")

@section('styles')
    <style>
        .my-handle {
            cursor: move;
            cursor: -webkit-grabbing;
        }
        .ghost {
            opacity: 0.4;
        }
    </style>
@endsection

@section('content')

    <div class="row" style="margin-bottom:20px">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{ route('todos.store') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-xs-9">
                        <input type="text" class="form-control" name="content" placeholder="点此添加新计划" required>
                    </div>
                    <div class="col-xs-3">
                        <button type="submit" class="btn btn-default">添加</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <ul id="items" class="list-group">
                @foreach($todos as $todo)
                    <li data-id="{{ $todo->id }}" class="list-group-item" style="display: flex;align-items: center;">
                        <span class="glyphicon glyphicon-move my-handle" style="float: left"></span>
                        <div style="padding:0 20px 0 20px;width: 100%;">{{ $todo->content }}</div>
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" style="color: #F08080;background-color: transparent;border: none;"><span class="glyphicon glyphicon-minus-sign"></span></button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

@section('script')
    {{--拖放排序--}}
    <script type="text/javascript" src="/js/sortable/Sortable.js"></script>
    <script>
        var el = document.getElementById('items');
        var sortable = new Sortable(el, {
            sort: true, // 开启排序
            animation: 200, //移动速度
            handle: ".my-handle", //拖动按钮
            ghostClass: "ghost", //拖动阴影
            group: "items",
            store: {
                /**
                 * Get the order of elements. Called once during initialization.
                 * @param   {Sortable}  sortable
                 * @returns {Array}
                 */
                get: function (sortable) {
                    var order = localStorage.getItem(sortable.options.group.name);
                    return order ? order.split('|') : [];
                },

                /**
                 * Save the order of elements. Called onEnd (when the item is dropped).
                 * @param {Sortable}  sortable
                 */
                set: function (sortable) {
                    var order = sortable.toArray();
                    localStorage.setItem(sortable.options.group.name, order.join('|'));
                }
            }
        });
    </script>
@endsection
