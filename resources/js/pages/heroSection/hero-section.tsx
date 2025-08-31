import AppLayout from '@/layouts/app-layout';
import { BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';
import DescriptionsCard from './components/descriptions-card';
import ImageCard from './components/image-card';
import PreviewData from './components/preview-data';
import TitlesCard from './components/titles-card';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
    {
        title: 'Hero Section',
        href: '/dashboard/hero-section',
    },
];

export default function HeroSection() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="container mx-auto space-y-6 p-6">
                <h1 className="mb-8 text-3xl font-bold">Hero Section - Edit Content</h1>

                <div className="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    {/* Image Card */}
                    <ImageCard />

                    {/* Title Card*/}
                    <TitlesCard />
                </div>

                {/* Description Card */}
                <DescriptionsCard />

                {/* Preview Data */}
                <PreviewData />
            </div>
        </AppLayout>
    );
}
