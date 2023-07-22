<!-- BEGIN #sidebar -->
<div id="sidebar" class="app-sidebar">
    <!-- BEGIN scrollbar -->
    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
        <!-- BEGIN menu -->
        <div class="menu">
            <div class="menu-header">Navigation</div>
            <div class="menu-item {{(request()->routeIs('')) ? 'active' :''}}" >
                <a href="/" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-cpu"></i></span>
                    <span class="menu-text">لوحة التحكم</span>
                </a>
            </div>
            <div class="menu-item ">
                <a href="#" class="menu-link "">
                    <span class="menu-icon"><i class="bi bi-bar-chart"></i></span>
                    <span class="menu-text">تحليل بيانات</span>
                </a>
            </div>
            <div class="menu-header">Components</div>
            <div class="menu-item has-sub">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="bi bi-bag-check"></i>
                        <span class="w-5px h-5px rounded-3 bg-theme position-absolute top-0 end-0 mt-3px me-3px"></span>
                    </div>
                    <div class="menu-text d-flex align-items-center">المبيعات</div> 
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <div class="menu-text">نقطة بيع الكاشير</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <div class="menu-text">نقطة بيع النادل</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#"  class="menu-link">
                            <div class="menu-text">الطلبات</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-divider"></div>
            <div class="menu-header">ادارة الاصناف</div>
            <div class="menu-item has-sub {{(request()->routeIs('items')) ? 'active' :''}}">
                <a href="javascript:;" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-columns-gap"></i></span>
                    <div class="menu-text">الاصناف</div>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item">
                        <a href="items" class="menu-link">
                            <div class="menu-text">قائمة الاصناف</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <div class="menu-text">Bulk import</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="menu-link">
                            <div class="menu-text">Bulk export</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item {{(request()->routeIs('categories')) ? 'active' :''}}">
                <a href="/categories" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-diagram-3"></i></span>
                    <div class="menu-text">الاقسام</div>
                </a>
            </div>
            <div class="menu-item has-sub {{(request()->routeIs('material')) ? 'active' :''}} {{(request()->routeIs('units')) ? 'active' :''}}">
                <a href="#" class="menu-link">
                    <span class="menu-icon "><i class="bi bi-basket3"></i></span>
                    <div class="menu-text">الخامات</div>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item">
                        <a href="/material"  class="menu-link">
                            <div class="menu-text">قائمة الخامات</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="/units" class="menu-link">
                            <div class="menu-text">الوحدات</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item {{(request()->routeIs('addons')) ? 'active' :''}}">
                <a href="/addons" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-bag-plus-fill"></i></span>
                    <div class="menu-text">الاضافات</div>
                </a>
            </div>
            <div class="menu-divider"></div>
            <div class="menu-header">الطاولات</div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-grid-3x3"></i></span>
                    <div class="menu-text">قائمة الطاولات</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-grid-3x3"></i></span>
                    <div class="menu-text">حجوزات الطاولات</div>
                </a>
            </div>
            <div class="menu-divider"></div>
            <div class="menu-header">المطبخ</div>
            <div class="menu-submenu">
                <div class="menu-item">
                    <a href="#" class="menu-link">
                        <span class="menu-icon"><i class="bi bi-basket"></i></span>
                        <div class="menu-text">الطلبات</div>
                    </a>
                </div>
            </div>
            
            <div class="menu-divider"></div>
            <div class="menu-header">ادارة الحسابات</div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-cart-plus"></i></span>
                    <div class="menu-text">المشتريات</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-building-dash"></i></span>
                    <div class="menu-text">المصروفات</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-shop"></i></span>
                    <div class="menu-text">المخزون</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-arrow-down-up"></i></span>
                    <div class="menu-text">ورديات العمل</div>
                </a>
            </div>
                
            <div class="menu-divider"></div>
            <div class="menu-header">ادارة التوصيل</div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-bicycle"></i></span>
                    <div class="menu-text">مندوب توصيل</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-geo-alt"></i></span>
                    <div class="menu-text">مناطق توصيل</div>
                </a>
            </div>
                
            <div class="menu-divider"></div>
            <div class="menu-header">ادارة المستخدمين</div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-menu-down"></i></span>
                    <div class="menu-text">الادوار</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-people"></i></span>
                    <div class="menu-text">المستخدمين</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-people"></i></span>
                    <div class="menu-text">العملاء</div>
                </a>
            </div>
            <div class="menu-divider"></div>
            <div class="menu-header">التقارير</div>
            
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-file-text"></i></span>
                    <div class="menu-text">تقرير المخزون</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-file-text"></i></span>
                    <div class="menu-text">تقرير المبيعات</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-file-text"></i></span>
                    <div class="menu-text">تقرير المشتريات</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-file-text"></i></span>
                    <div class="menu-text">تقرير العملاء الاكثر طلبا</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-file-text"></i></span>
                    <div class="menu-text">تقرير الربح والخساره</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-file-text"></i></span>
                    <div class="menu-text">تقرير المصروفات</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-file-text"></i></span>
                    <div class="menu-text">تقرير المنتجات الاكثر مبيعا</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-file-text"></i></span>
                    <div class="menu-text">سجل النشاطات</div>
                </a>
            </div>
            <div class="menu-divider"></div>
            <div class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-gear"></i></span>
                    <span class="menu-text">الاعدادات</span>
                </a>
            </div>
        </div>
        <!-- END menu -->
    </div>
    <!-- END scrollbar -->
</div>