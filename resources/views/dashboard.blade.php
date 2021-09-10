<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sales Team') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button data-toggle="modal" data-target="#createFormModal" onclick="newform()" class="bg-green-600 mb-3 float-right font-semibold text-white p-2 rounded hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300">New User</button>
                    <table class="table-auto border-collapse border border-green-800 w-full">
                        <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Current Route</th>
                                <th colspan="3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($salesteams as $team)
                            <tr id="row{{$team->id}}">
                                <td>{{$team->id}}</td>
                                <td>{{$team->fullname}}</td>
                                <td>{{$team->email}}</td>
                                <td>{{$team->telephone}}</td>
                                <td>{{$team->route->name}}</td>
                                <td>
                                    <button data-toggle="modal" data-target="#viewModal" onclick="viewSalesTeam({{$team->id}})" class="bg-green-600 font-semibold text-white p-2 rounded hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"><i class="fa fa-fw fa-eye"></i></button>
                                </td>
                                <td>
                                    <button data-toggle="modal" data-target="#editFormModal" onclick="editSalesTeam({{$team->id}})" class="bg-blue-600 font-semibold text-white p-2 rounded hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"><i class="fa fa-fw fa-edit"></i></button>
                                </td>
                                <td>
                                    <button onclick="deleteSalesTeam({{$team->id}})" class="bg-red-600 font-semibold text-white p-2 rounded hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300"><i class="fa fa-fw fa-trash"></i></button>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="8">No team members found!</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
