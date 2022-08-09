import React from 'react';
import { Box, Image } from '@chakra-ui/react';

const BannerImage = ({ src }) => {
    return (
        <Box boxSize='100%'>
            <Image src={src} w='100%' alt='Banner Image' />
        </Box>
    );
}

export default BannerImage;