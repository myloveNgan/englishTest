@extends('backend.dashboard')
@section('content')
    <div id="app-content">
        <div class="app-content-area">
            <div class="container_list_student">
                <div class="d-flex justify-content-between mb-4">
                    <h3>Danh sách giáo viên</h3>
                    <form>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" value="{{ old('search') }}"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Tìm kiếm</button>
                        </div>
                    </form>
                </div>
                @if (session()->has('message'))
                    <div class="alert box_alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Họ và tên</th>
                                <th>Tài khoản</th>
                                {{-- <th>Mật khẩu</th> --}}
                                <th>Email</th>
                                <th>Trạng thái</th>
                                <th colspan="2">Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teacher as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->admin_id}}</td>
                                    <td>{{ $item->admin_name }}</td>
                                    <td>{{ $item->admin_user }}</td>
                                    {{-- <td>{{ $item->admin_password }}</td> --}}
                                    <td>{{ $item->admin_email }}</td>
                                    <td>
                                        <a href="{{route('sale_edit',$item->admin_id)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M4.51307 22.5101C4.45167 22.5101 4.39026 22.5101 4.32839 22.5045C3.73488 22.469 3.1652 22.2584 2.69132 21.8993C2.21743 21.5403 1.8606 21.0488 1.66588 20.487C1.47116 19.9252 1.4473 19.3183 1.59731 18.743C1.74732 18.1677 2.06447 17.6497 2.5087 17.2545L10.3148 10.1286C10.4157 10.0352 10.4888 9.91569 10.526 9.78331C10.5631 9.65092 10.5629 9.51083 10.5253 9.37858C9.82823 6.89889 10.2595 4.6517 11.7089 3.21311C13.3837 1.54952 16.057 1.03108 18.2076 1.95217C18.3537 2.01478 18.4777 2.11964 18.5638 2.25329C18.6498 2.38694 18.6939 2.54326 18.6904 2.70217C18.6875 2.90953 18.6033 3.10746 18.456 3.25342L15.6374 6.0692C15.4974 6.2106 15.4189 6.40155 15.4189 6.60053C15.4189 6.79952 15.4974 6.99046 15.6374 7.13186L16.8815 8.37592C17.0229 8.51525 17.2134 8.59335 17.4119 8.59335C17.6104 8.59335 17.8009 8.51525 17.9423 8.37592L20.7754 5.54045C20.8647 5.45112 20.9739 5.38427 21.094 5.34543C21.2142 5.30659 21.3419 5.29686 21.4665 5.31705C21.5912 5.33724 21.7093 5.38677 21.811 5.46155C21.9128 5.53633 21.9953 5.63423 22.0518 5.74717L22.0556 5.75467C22.4901 6.6453 22.6181 7.84952 22.4114 9.05186C22.1901 10.3278 21.6145 11.4762 20.7942 12.2862C19.3678 13.6925 17.1449 14.1256 14.6962 13.4698C14.5655 13.4351 14.4277 13.4366 14.2978 13.4742C14.1679 13.5119 14.0507 13.5843 13.9589 13.6836L6.75464 21.5033C6.47272 21.8192 6.12739 22.0721 5.74116 22.2456C5.35493 22.4191 4.93648 22.5092 4.51307 22.5101ZM15.9651 3.00358C14.7904 3.00358 13.5942 3.45405 12.7635 4.27905C11.2701 5.76077 11.7089 8.05577 11.9667 8.97358C12.0797 9.37201 12.0799 9.79398 11.9673 10.1925C11.8548 10.5911 11.6339 10.9506 11.3292 11.2311L11.3254 11.2344L3.50854 18.3748C3.36034 18.5062 3.23947 18.6655 3.15282 18.8435C3.06617 19.0216 3.01545 19.215 3.00355 19.4127C2.99164 19.6104 3.01879 19.8085 3.08344 19.9956C3.14809 20.1828 3.24898 20.3555 3.38034 20.5037C3.5117 20.6519 3.67097 20.7727 3.84905 20.8594C4.02712 20.946 4.22052 20.9967 4.4182 21.0087C4.61588 21.0206 4.81397 20.9934 5.00116 20.9288C5.18835 20.8641 5.36097 20.7632 5.50917 20.6319C5.55448 20.5918 5.59722 20.5489 5.63714 20.5034L5.64698 20.4931L12.8592 12.665C13.1363 12.3653 13.49 12.1469 13.8821 12.0333C14.2742 11.9197 14.6899 11.9153 15.0843 12.0205C15.9946 12.2642 18.2681 12.6734 19.7423 11.218C20.7145 10.2608 21.1124 8.6928 20.9849 7.4553L19.0021 9.43952C18.5791 9.85802 18.0081 10.0928 17.4131 10.0928C16.818 10.0928 16.247 9.85802 15.824 9.43952L14.5767 8.19264C14.1574 7.76946 13.9222 7.19786 13.9222 6.60217C13.9222 6.00648 14.1574 5.43488 14.5767 5.0117L16.5454 3.04295C16.353 3.0173 16.1592 3.00415 15.9651 3.00358ZM21.8395 6.59842L21.8371 6.60123L21.8395 6.59842Z"
                                                    fill="#21272A" />
                                                <path
                                                    d="M4.5 20.25C4.91421 20.25 5.25 19.9142 5.25 19.5C5.25 19.0858 4.91421 18.75 4.5 18.75C4.08579 18.75 3.75 19.0858 3.75 19.5C3.75 19.9142 4.08579 20.25 4.5 20.25Z"
                                                    fill="#21272A" />
                                            </svg>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('delete_teacher', $item->admin_id) }}" onclick="return confirm('Bạn có muốn xóa học viên này không?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                viewBox="0 0 24 24" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.20324 4.50149C5.61665 4.47565 5.97273 4.78983 5.99856 5.20324L6.93606 20.2032C6.93624 20.206 6.9364 20.2088 6.93654 20.2115C6.96247 20.7163 7.29759 21 7.68753 21H16.3125C16.6986 21 17.0322 20.7226 17.0639 20.2043L18.0015 5.20324C18.0273 4.78983 18.3834 4.47565 18.7968 4.50149C19.2102 4.52732 19.5244 4.8834 19.4986 5.29681L18.5611 20.2958C18.5611 20.2958 18.5611 20.2959 18.5611 20.2959C18.4868 21.5109 17.583 22.5 16.3125 22.5H7.68753C6.429 22.5 5.5039 21.5196 5.43875 20.293L4.50149 5.29681C4.47565 4.8834 4.78983 4.52732 5.20324 4.50149Z"
                                                    fill="#21272A" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3 5.25C3 4.83579 3.33579 4.5 3.75 4.5H20.25C20.6642 4.5 21 4.83579 21 5.25C21 5.66421 20.6642 6 20.25 6H3.75C3.33579 6 3 5.66421 3 5.25Z"
                                                    fill="#21272A" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.1228 3C10.0738 2.99986 10.0253 3.0094 9.97997 3.02809C9.93468 3.04677 9.89352 3.07423 9.85887 3.10887C9.82423 3.14352 9.79677 3.18468 9.77809 3.22997C9.7594 3.27527 9.74986 3.32381 9.75 3.37281L9.75 3.375V5.25C9.75 5.66422 9.41422 6 9 6C8.58579 6 8.25 5.66422 8.25 5.25V3.37596C8.24945 3.12966 8.2975 2.88567 8.39143 2.65798C8.48551 2.4299 8.62376 2.22267 8.79821 2.04821C8.97267 1.87376 9.1799 1.73551 9.40798 1.64143C9.63567 1.5475 9.87966 1.49945 10.126 1.5H13.874C14.1203 1.49945 14.3643 1.5475 14.592 1.64143C14.8201 1.73551 15.0273 1.87375 15.2018 2.04821C15.3763 2.22267 15.5145 2.4299 15.6086 2.65798C15.7025 2.88572 15.7506 3.12976 15.75 3.37612V5.25C15.75 5.66422 15.4142 6 15 6C14.5858 6 14.25 5.66422 14.25 5.25V3.375L14.25 3.37281C14.2502 3.32381 14.2406 3.27527 14.2219 3.22997C14.2032 3.18467 14.1758 3.14352 14.1411 3.10887C14.1065 3.07423 14.0653 3.04677 14.02 3.02809C13.9747 3.0094 13.9262 2.99986 13.8772 3L13.875 3H10.125L10.1228 3Z"
                                                    fill="#21272A" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12 7.5C12.4142 7.5 12.75 7.83579 12.75 8.25V18.75C12.75 19.1642 12.4142 19.5 12 19.5C11.5858 19.5 11.25 19.1642 11.25 18.75V8.25C11.25 7.83579 11.5858 7.5 12 7.5Z"
                                                    fill="#21272A" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.59824 7.50049C9.01219 7.4857 9.35975 7.80929 9.37453 8.22324L9.74953 18.7232C9.76432 19.1372 9.44073 19.4847 9.02678 19.4995C8.61283 19.5143 8.26527 19.1907 8.25049 18.7768L7.87549 8.27678C7.8607 7.86283 8.18429 7.51527 8.59824 7.50049Z"
                                                    fill="#21272A" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15.4018 7.50049C15.8157 7.51527 16.1393 7.86283 16.1245 8.27678L15.7495 18.7768C15.7347 19.1907 15.3872 19.5143 14.9732 19.4995C14.5593 19.4847 14.2357 19.1372 14.2505 18.7232L14.6255 8.22324C14.6403 7.80929 14.9878 7.4857 15.4018 7.50049Z"
                                                    fill="#21272A" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
