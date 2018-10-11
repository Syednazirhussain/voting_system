

<li class="{{ Request::is('itemCategories*') ? 'active' : '' }}">
    <a href="{!! route('admin.itemCategories.index') !!}"><i class="fa fa-edit"></i><span>Item Categories</span></a>
</li>

<li class="{{ Request::is('items*') ? 'active' : '' }}">
    <a href="{!! route('admin.items.index') !!}"><i class="fa fa-edit"></i><span>Items</span></a>
</li>

<li class="{{ Request::is('employees*') ? 'active' : '' }}">
    <a href="{!! route('admin.employees.index') !!}"><i class="fa fa-edit"></i><span>Employees</span></a>
</li>

<li class="{{ Request::is('userRoles*') ? 'active' : '' }}">
    <a href="{!! route('admin.userRoles.index') !!}"><i class="fa fa-edit"></i><span>User Roles</span></a>
</li>

<li class="{{ Request::is('userStatuses*') ? 'active' : '' }}">
    <a href="{!! route('admin.userStatuses.index') !!}"><i class="fa fa-edit"></i><span>User Statuses</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('admin.users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>


<li class="{{ Request::is('floors*') ? 'active' : '' }}">
    <a href="{!! route('admin.floors.index') !!}"><i class="fa fa-edit"></i><span>Floors</span></a>
</li>



<li class="{{ Request::is('customers*') ? 'active' : '' }}">
    <a href="{!! route('admin.customers.index') !!}"><i class="fa fa-edit"></i><span>Customers</span></a>
</li>

<li class="{{ Request::is('tableZones*') ? 'active' : '' }}">
    <a href="{!! route('admin.tableZones.index') !!}"><i class="fa fa-edit"></i><span>Table Zones</span></a>
</li>

<li class="{{ Request::is('tableSeats*') ? 'active' : '' }}">
    <a href="{!! route('admin.tableSeats.index') !!}"><i class="fa fa-edit"></i><span>Table Seats</span></a>
</li>

<li class="{{ Request::is('kitchens*') ? 'active' : '' }}">
    <a href="{!! route('admin.kitchens.index') !!}"><i class="fa fa-edit"></i><span>Kitchens</span></a>
</li>

<li class="{{ Request::is('paymentMethods*') ? 'active' : '' }}">
    <a href="{!! route('admin.paymentMethods.index') !!}"><i class="fa fa-edit"></i><span>Payment Methods</span></a>
</li>


<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{!! route('sales.orders.index') !!}"><i class="fa fa-edit"></i><span>Orders</span></a>
</li>

<li class="{{ Request::is('restaurantSettings*') ? 'active' : '' }}">
    <a href="{!! route('admin.restaurantSettings.index') !!}"><i class="fa fa-edit"></i><span>Restaurant Settings</span></a>
</li>

<li class="{{ Request::is('orderItems*') ? 'active' : '' }}">
    <a href="{!! route('sales.orderItems.index') !!}"><i class="fa fa-edit"></i><span>Order Items</span></a>
</li>

<li class="{{ Request::is('orderKitchens*') ? 'active' : '' }}">
    <a href="{!! route('sales.orderKitchens.index') !!}"><i class="fa fa-edit"></i><span>Order Kitchens</span></a>
</li>

<li class="{{ Request::is('elections*') ? 'active' : '' }}">
    <a href="{!! route('elections.index') !!}"><i class="fa fa-edit"></i><span>Elections</span></a>
</li>

<li class="{{ Request::is('participants*') ? 'active' : '' }}">
    <a href="{!! route('admin.participants.index') !!}"><i class="fa fa-edit"></i><span>Participants</span></a>
</li>

<li class="{{ Request::is('politicalGroups*') ? 'active' : '' }}">
    <a href="{!! route('admin.politicalGroups.index') !!}"><i class="fa fa-edit"></i><span>Political Groups</span></a>
</li>

<li class="{{ Request::is('electionParticipants*') ? 'active' : '' }}">
    <a href="{!! route('electionParticipants.index') !!}"><i class="fa fa-edit"></i><span>Election Participants</span></a>
</li>

<li class="{{ Request::is('electionParticipants*') ? 'active' : '' }}">
    <a href="{!! route('admin.electionParticipants.index') !!}"><i class="fa fa-edit"></i><span>Election Participants</span></a>
</li>

<li class="{{ Request::is('votes*') ? 'active' : '' }}">
    <a href="{!! route('vote.votes.index') !!}"><i class="fa fa-edit"></i><span>Votes</span></a>
</li>

