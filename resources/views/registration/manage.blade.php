@extends('layouts.app')

@section('content')
<main class="main">
            <div class="container-fluid">
                <div class="page__inner">
                    <div class="page__top flex-wrap">
                        <h3 class="page__title">Manage Registration</h3>

<!--                        <a class="btn btn-outline-primary">Add Report</a>-->
                    </div>

                    <form method="get" class="search-form col-lg-6">
                        <div class="form-group">
                            <label>Choose end of registration date:</label>
                            <div class="block-search">
                                <input type="datetime-local" class="form-control" name="expiry_date" value="2021-09-20T12:30">
                                <button class="btn btn-outline-primary registration-save-btn">Save date</button>
                            </div>
                        </div>
                    </form>

                    <form method="get">
                        <div class="d-flex registration-forms search-second">
                            <div class="form-group flex-column align-items-start">
                                <label>Search by student ID</label>
                                <div class="block-search">
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp"
                                           v-model="search">
                                </div>
                            </div>

                            <div class="form-group flex-column align-items-start ml-3">
                                <label class="form-label">Beta type:</label>
                                <select id="inputState" class="form-select">
                                    <option selected>-------</option>
                                    <option>SDU Beta</option>
                                    <option>Academic Beta</option>
                                    <option>Industrial Beta</option>
                                </select>
                            </div>

                            <div class="form-group flex-column align-items-start ml-3">
                                <label class="form-label">Registration status</label>
                                <select id="inputState" class="form-select">
                                    <option selected>-------</option>
                                    <option>Pending</option>
                                    <option>Approved</option>
                                    <option>Rejected</option>
                                </select>
                            </div>

                            <div class="btn-box">
                                <button class="btn btn-outline-primary registration-save-btn">Save date</button>
                            </div>
                        </div>
                    </form>

                    <div class="table-outer">
                        <table class="table main-table">
                            <thead>
                                <tr>
                                  <th>Student</th>
                                  <th>SDU ID</th>
                                  <th>Supervisor</th>
                                  <th>Beta type</th>
                                  <th>Agreement</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                  <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                <tr>
                                    <td>{{ info.student }}</td>
                                    <td>{{ info.sduID }}</td>
                                    <td>{{ info.supervisor }}</td>
                                    <td>{{ info.betaType }}</td>
                                    <td>
                                      <a href="#">Download</a>
                                    </td>
                                    <td>{{ info.status }}</td>
                                    <td>
                                      <button class="btn btn-outline-primary btn-table">
                                        Cancel approve
                                      </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="align-content-center justify-content-center d-flex">
                        <ul class="pagination">
                            <li>
                                <button class="btn btn-outline-primary"> < </button>
                            </li>
                            <li>
                                <button class="btn btn-outline-primary">1</button>
                            </li>
                            <li>
                                <button class="btn btn-outline-primary">2</button>
                            </li>
                            <li>
                                <button class="btn btn-outline-primary">3</button>
                            </li>
                            <li>
                                <button class="btn btn-outline-primary"> > </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
@endsection