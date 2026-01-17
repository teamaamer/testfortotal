@extends('layouts.dashboard.modern')

@section('title', 'Affiliated Academies')

@section('css')
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,600,700' rel='stylesheet' type='text/css'>
<style>
    * {
        font-family: 'Lato', sans-serif;
    }
    
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1.5rem;
        gap: 1rem;
        flex-wrap: wrap;
    }
    
    .page-header-left h1 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }
    
    .page-header-left p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.875rem;
    }
    
    .controls-bar {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
        align-items: center;
    }
    
    .search-box {
        flex: 1;
        min-width: 250px;
        max-width: 400px;
        position: relative;
    }
    
    .search-input {
        width: 100%;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--glass-border);
        border-radius: 10px;
        padding: 0.625rem 1rem 0.625rem 2.5rem;
        color: white;
        font-size: 0.875rem;
        transition: all 0.3s ease;
    }
    
    .search-input:focus {
        outline: none;
        border-color: rgba(102, 126, 234, 0.5);
        background: rgba(255, 255, 255, 0.15);
    }
    
    .search-input::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }
    
    .search-icon {
        position: absolute;
        left: 0.875rem;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.5);
        pointer-events: none;
    }
    
    .academies-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 1.5rem;
    }
    
    .academy-card {
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s ease;
        position: relative;
    }
    
    .academy-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.3);
    }
    
    .academy-header {
        height: 120px;
        background: var(--primary-gradient);
        position: relative;
        overflow: hidden;
    }
    
    .academy-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.1)" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,106.7C1248,96,1344,96,1392,96L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
        background-size: cover;
        opacity: 0.3;
    }
    
    .academy-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 4px solid var(--card-bg);
        position: absolute;
        bottom: -50px;
        left: 50%;
        transform: translateX(-50%);
        overflow: hidden;
        background: white;
    }
    
    .academy-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .academy-body {
        padding: 3.5rem 1.5rem 1.5rem;
        text-align: center;
    }
    
    .academy-name {
        font-size: 1.125rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.75rem;
    }
    
    .academy-summary {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.875rem;
        line-height: 1.6;
        margin-bottom: 1.25rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 3.6em;
    }
    
    .academy-footer {
        padding: 1rem 1.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        justify-content: center;
    }
    
    .view-btn {
        padding: 0.625rem 1.5rem;
        background: var(--primary-gradient);
        color: white;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .view-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        color: white;
    }
    
    .no-academies {
        text-align: center;
        padding: 4rem 1rem;
        color: rgba(255, 255, 255, 0.6);
    }
    
    .no-academies i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
    
    .no-academies p {
        font-size: 1.125rem;
    }
    
    @media (max-width: 768px) {
        .academies-grid {
            grid-template-columns: 1fr;
        }
        
        .controls-bar {
            flex-direction: column;
            align-items: stretch;
        }
        
        .search-box {
            max-width: 100%;
        }
    }
</style>
@endsection




@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-left">
            <h1>Affiliated Academies</h1>
            <p>Academies officially partnered with our platform</p>
        </div>
    </div>

    <!-- Controls Bar -->
    <div class="controls-bar">
        <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="academy-search" class="search-input" placeholder="Search academies...">
        </div>
    </div>

    <!-- Academies Grid -->
    <div id="academies-container" class="academies-grid">
        @foreach ($academies as $academy)
            <div class="academy-card" data-name="{{ strtolower($academy->name) }}" data-summary="{{ strtolower($academy->summary) }}">
                <div class="academy-header">
                    <div class="academy-avatar">
                        <img src="{{ asset('/uploads/avatars/' . $academy->avatar) }}" alt="{{ $academy->name }}">
                    </div>
                </div>
                <div class="academy-body">
                    <h3 class="academy-name">{{ $academy->name }}</h3>
                    <p class="academy-summary">{{ $academy->summary }}</p>
                </div>
                <div class="academy-footer">
                    <a href="{{ url('dashboard/academies/' . $academy->id) }}" class="view-btn">
                        <i class="fas fa-arrow-right"></i> View Details
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    
    <div id="no-academies" class="no-academies" style="display: none;">
        <i class="fas fa-university"></i>
        <p>No academies found</p>
    </div>
    
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('academy-search');
            const academiesContainer = document.getElementById('academies-container');
            const noAcademies = document.getElementById('no-academies');
            const academyCards = document.querySelectorAll('.academy-card');
            
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                let visibleCount = 0;
                
                academyCards.forEach(function(card) {
                    const name = card.getAttribute('data-name');
                    const summary = card.getAttribute('data-summary');
                    
                    if (name.includes(searchTerm) || summary.includes(searchTerm)) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });
                
                if (visibleCount === 0) {
                    academiesContainer.style.display = 'none';
                    noAcademies.style.display = 'block';
                } else {
                    academiesContainer.style.display = 'grid';
                    noAcademies.style.display = 'none';
                }
            });
        });
    </script>
@endsection
