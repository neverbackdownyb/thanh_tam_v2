<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>Quản lý nhân viên</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('partients.index') }}"
       class="nav-link {{ Request::is('partients*') ? 'active' : '' }}">
        <p>Quản lý bệnh nhân </p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('diagnoses.index') }}"
       class="nav-link {{ Request::is('diagnoses*') ? 'active' : '' }}">
        <p>Chuẩn đoán</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('treatments.index') }}"
       class="nav-link {{ Request::is('treatments*') ? 'active' : '' }}">
        <p>Điều trị</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('services.index') }}"
       class="nav-link {{ Request::is('services*') ? 'active' : '' }}">
        <p>Dịch vụ</p>
    </a>
</li>




<li class="nav-item">
    <a href="{{ route('payments.index') }}"
       class="nav-link {{ Request::is('payments*') ? 'active' : '' }}">
        <p>Lịch sử thanh toán</p>
    </a>
</li>


