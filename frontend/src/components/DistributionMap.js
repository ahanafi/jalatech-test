import React from 'react';
import {
    Box,
    Center,
    Flex,
    Heading
} from '@chakra-ui/react';
import ColorIndicator from './ColorIndicator';


const DistributionMap = () => {
    return (
        <Box w='60%'>
            <Flex direction={'column'}>
                <Box p={'10px'} bg={'white'} color='gray'>
                    <Heading fontSize='16px' as={'h5'}>Persebaran Harga Udang Size 100</Heading>
                </Box>
                <Box
                    bg={'lightgreen'}
                    display={'flex'}
                    alignItems='center'
                    justifyContent={'center'}
                    h={270}>
                    MAP
                </Box>
                <Box bg={'white'} py='10px'>
                    <Center>
                        <ColorIndicator color='gray' text='> 1 Bulan' />
                        <ColorIndicator color='#133878' text='> 1 Minggu' />
                        <ColorIndicator color='#1b77df' text='Baru' />
                    </Center>
                </Box>
            </Flex>
        </Box>
      );
}

export default DistributionMap;