import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { usePage } from '@inertiajs/react';

type HeroSectionType = {
    imagePath: string | null;
    titles: { id: number; title: string }[];
    descriptions: { id: number; description: string }[];
};

type PageProps = {
    heroSection: HeroSectionType;
};

export default function PreviewData() {
    const { heroSection } = usePage<PageProps>().props;

    return (
        <Card className="mt-6">
            <CardHeader>
                <CardTitle>Preview</CardTitle>
            </CardHeader>
            <CardContent>
                <div className="flex flex-col items-center space-y-4 text-center">
                    <img src={`/storage/${heroSection?.imagePath}`} alt="Profile Preview" className="h-32 w-32 rounded-full object-cover" />
                    <div>
                        {heroSection?.titles?.map((title, index: number) => (
                            <h2 key={index} className="text-2xl font-bold">
                                {title?.title}
                            </h2>
                        ))}
                    </div>
                    <div>
                        {heroSection?.descriptions?.map((description, index: number) => (
                            <p key={index} className="text-gray-300">
                                {description?.description}
                            </p>
                        ))}
                    </div>
                </div>
            </CardContent>
        </Card>
    );
}
