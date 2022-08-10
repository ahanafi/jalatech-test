import React from 'react';
import FilterBar from './FilterBar';
import Navbar from './Navbar';
import {
    Grid,
    GridItem,
    Flex,
    Box,
    Text,
    Heading
} from '@chakra-ui/react';
import BannerImage from './BannerImage';
import LabUdang from './../images/lab-udang.png';
import PanenUdang from './../images/panen-udang.png';
import Dojeto from './../images/dojeto.png';
import SmartFarm from './../images/smart-farm.jpeg';
import DistributionMap from './DistributionMap';
import ShrimpPriceListTable from './ShrimpPriceListTable';
import regions from './../data/regions.json';
import shrimpPrices from './../data/shrimp_prices.json';

const ShrimpPrice = () => {
    return (
        <>
            <Navbar/>
            <FilterBar regions={regions} shrimpPrices={shrimpPrices} />

            <Box px={100}>
                <Grid templateColumns='repeat(2, 1fr)' gap={6} mt={5}>
                    <GridItem w='100%'>
                        <BannerImage src={LabUdang} />
                    </GridItem>
                    <GridItem w='100%'>
                        <BannerImage src={PanenUdang} />
                    </GridItem>
                </Grid>

                <Flex color='white' mt={25}>
                    <DistributionMap />
                    <Flex w='40%'>
                        <Box w='60%' bg='tomato'>
                            <Text>Box 3</Text>
                        </Box>
                        <Box w='60%' bg='tomato'>
                            <Text>Box 3</Text>
                        </Box>
                    </Flex>
                </Flex>

                <Grid templateColumns='repeat(2, 1fr)' gap={6} mt={5}>
                    <GridItem w='100%'>
                        <BannerImage src={Dojeto} />
                    </GridItem>
                    <GridItem w='100%'>
                        <BannerImage src={SmartFarm} />
                    </GridItem>
                </Grid>

                <Box w='100%' mt={5}>
                    <Flex direction={'column'}>
                        <Box p={'15px'} bg={'white'} color='gray' borderBottom={'1px'} borderBottomColor='#ccc'>
                            <Heading fontSize='16px' as={'h5'}>List Harga Udang</Heading>
                        </Box>
                        <Box p={'15px'} bg='white' h='320px' overflowY={'scroll'}>
                            <ShrimpPriceListTable priceLists={shrimpPrices} />
                        </Box>
                    </Flex>
                </Box>
            </Box>
        </>
    );
}

export default ShrimpPrice;