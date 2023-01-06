<div class="card-body table-responsive p-0" style="margin-top: 620px; margin-left: 50px; margin-right: 50px">
    <table class="table table-striped table-valign-middle">
        <thead>
            @php $i=1; @endphp
            <tr>
                <th></th>
                <th>ID Order</th>
                <th>Total</th>
                <th>Pay</th>
                <th>Description</th>
                <th>Date</th>
                <th>Details</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>
                        {{ $i++ }}
                    </td>
                    <td>
                        {{ $order->IDorder }}
                    </td>
                    <td>{{ $order->total }}</td>
                    <td>
                        {{ $order->pay }}
                    </td>
                    <td>
                        {{ $order->description }}
                    </td>
                    <td>
                        {{ $order->created_at }}
                    </td>
                    <td>
                        <a href="order-detail/{{ $order->IDorder }}">Details</a>
                    </td>
                </tr>
                </tr>
            @endforeach
        </tbody>
        
    </table>
    {{ $orders->links() }}
</div>
