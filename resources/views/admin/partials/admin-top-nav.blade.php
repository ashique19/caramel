<!-- Hero head: will stick at the top -->
<div class="hero-head xs-margin-top-50 hidden-xs" id="admin-nav">
    <header class="navbar margin-bottom-0 z-100">
        <div class="container">
            <div id="admin-menu" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="{{ route('dashboard') }}">
                    Dashboard
                    </a>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="#">
                        Settings
                        </a>
                        <div class="navbar-dropdown is-boxed">
                            <a class="navbar-item" href="{{ action('Cost_types@index') }}">
                            Cost Types
                            </a>
                        </div>
                    </div>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="#">
                        Accounts
                        </a>
                        <div class="navbar-dropdown is-boxed">
                            <a class="navbar-item" href="{{ action('Costs@index') }}">
                            Costs
                            </a>
                            <a class="navbar-item" href="{{ action('Payments@index') }}">
                            Payments
                            </a>
                        </div>
                    </div>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="#">
                        Reports
                        </a>
                        <div class="navbar-dropdown is-boxed">
                            <a class="navbar-item" href="{{ action('Reports@getIncomeStatement') }}">
                            Statement of Financial Performance
                            </a>
                            <a class="navbar-item" href="{{ action('Reports@getBalanceSheet') }}">
                            Statement of Financial Position
                            </a>
                            <a class="navbar-item" href="{{ action('Reports@SaleByMonth') }}">
                            Sale by Month
                            </a>
                            <a class="navbar-item" href="{{ action('Products@productList') }}">
                            Stock & Sale
                            </a>
                            <a class="navbar-item" href="{{ action('Reports@postStockRevenueSummary') }}">
                            Stock Revenue Summary
                            </a>
                        </div>
                    </div>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="#">
                        Print
                        </a>
                        <div class="navbar-dropdown is-boxed">
                            <a class="navbar-item" href="{{ action('Products@priceTag') }}">
                            Price Tag
                            </a>
                            <a class="navbar-item" href="{{ action('Products@orderList') }}">
                            Order Sheet
                            </a>
                        </div>
                    </div>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="#">
                        Orders
                        </a>
                        <div class="navbar-dropdown is-boxed">
                            <a class="navbar-item" href="{{ action('AdminOrders@create') }}">
                            Create
                            </a>
                            <a class="navbar-item" href="{{ action('AdminOrders@index') }}">
                            List
                            </a>
                            <a class="navbar-item" href="{{ action('AdminOrders@getOrderedProducts') }}">
                            Products
                            </a>
                            <a class="navbar-item" href="{{ action('Products@sync_purchase_price_to_orders') }}">
                            Sync purchase price
                            </a>
                        </div>
                    </div>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="#">
                        Users
                        </a>
                        <div class="navbar-dropdown is-boxed">
                            <a class="navbar-item" href="{{ action('Users@index') }}">
                            All
                            </a>
                            <a class="navbar-item" href="{{ action('Users@syncFromOrders') }}">
                            Sync orders to users
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>

