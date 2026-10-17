@extends('templates.base')
@section('theme')
:root { --font: Georgia, 'Times New Roman', serif; --bg: #ffffff; --text: #1f2937; --heading: #111827; --muted: #6b7280; --card: #f9fafb; --line: #e5e7eb; --accent: #111827; --hero-bg: #ffffff; --hero-text: #111827; --hero-muted: #6b7280; --ring: #e5e7eb; --tag-bg: #f3f4f6; --tag-text: #374151; --radius: 8px; }
.hero { border-bottom: 1px solid var(--line); text-align: center; }
.hero-inner { flex-direction: column; justify-content: center; }
.bio { margin-left: auto; margin-right: auto; }
@endsection